String.prototype.createId = function () {
  return this.substring(this.lastIndexOf("/"));
};

String.prototype.getId = function () {
  return this.substring(this.lastIndexOf("/") + 1);
};