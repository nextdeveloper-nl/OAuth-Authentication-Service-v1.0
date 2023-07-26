String.prototype.t1 = function (lang) {
  console.log("lang",lang);
  console.log("text", this);
  let hash = (this +' '+ lang)
  console.log('hash',hash);
  return this;
};
