String.prototype.t1 = function () {
    let locale = localStorage.getItem('locale')
    let hash = (this +' '+ locale)
    return this;
  };
  