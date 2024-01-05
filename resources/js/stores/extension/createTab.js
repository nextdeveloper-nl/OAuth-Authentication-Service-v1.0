Array.prototype.createTab = function () {
  let tabList = [];
  this.forEach((element) => {
    let valid=element.charAt(element.lastIndexOf("/"),0)
    if (valid === "/") {
        let tabItem = element.substring(element.lastIndexOf("/")+1,element.length).replace("-"," ")
        let styledItem = tabItem[0].toUpperCase() + tabItem.substring(1)
        tabList.push(styledItem);
    }
  });
  return tabList;
};
