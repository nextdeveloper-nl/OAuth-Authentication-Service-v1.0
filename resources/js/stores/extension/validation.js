const hasConsecutiveDuplicates = (inputString) => {
    for (let i = 0; i < inputString.length - 1; i++) {
        if (inputString[i] === inputString[i + 1]) {
            return true; // Consecutive duplicates found
        }
    }
    return false; // No consecutive duplicates found
}

const $v = (value,type,minLength) => {
    switch (type){
        case 'string':
            return !/^[a-zA-Z\s]*$/.test(value)
        case 'required' :
            return value === '';
        case 'minLength':
            return value.length < (minLength || 2);
        case 'consecutive':
            return hasConsecutiveDuplicates(value);
        case 'email':
            return  !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
        case 'integer':
            return  !/^\d+$/.test(value);
    }
}

export { $v };