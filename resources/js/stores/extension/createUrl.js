export function createUrl(baseurl, args) {
    return baseurl + joinArgs(args);
  }
  
  function joinArgs(args) {
    let str = `?`;
  
    for (const key in args) {
      if (args[key]) str += `${key}=${args[key]}&`;
    }
  
    let result = str.slice(0, -1);
  
    return result;
  }
  