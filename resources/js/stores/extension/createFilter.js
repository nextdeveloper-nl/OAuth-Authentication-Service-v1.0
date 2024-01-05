Array.prototype.createFilter = function () {
    let filter = {};
    for (let i = 0; i < this.length; i++) {
      const element = this[i];
      if (element.value) {
        let field = element.field;
        filter[`${field}`] = element.value;
      }
    }

    console.log(filter);

  return filter;
};
