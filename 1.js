//#1
function pickPropArray(arr, prop) {
  return arr.filter(obj => obj[prop]).map(obj => obj[prop]);
}

const students = [
  { name: 'Вася'},
  { name: 'Павел', age: 10 },
  { name: 'Иван', age: 20 },
  { name: 'Эдем', age: 20 },
  { name: 'Денис', age: 20 },
  { name: 'Виктория', age: 20 },
  { age: 40 },
]
 
const result = pickPropArray(students, 'name');

console.log('Задание 1');
console.log(result);

//#2
function createCounter(){
  let count = 0;
  return function(){
    count++;
    console.log(count);
  }
}

console.log('Задание 2');

const counter1 = createCounter();
counter1(); // 1
counter1(); // 2

const counter2 = createCounter();
counter2(); // 1
counter2(); // 2

//#3
function spinWords(str){
  const words = str.split(' ');
  for (var i = 0; i < words.length; i++) {
    if (words[i].length >= 5) {
        words[i] = words[i].split('').reverse().join('');
    }
}
return words.join(' ');
}

console.log('Задание 3');

const result1 = spinWords("Привет от Legacy");
console.log(result1); // тевирП от ycageL

const result2 = spinWords("This is a test");
console.log(result2); // This is a test

//#4
function summa(nums, target) {
    let result = [];
    for (var i = 0; i < nums.length; i++) {
        for (var j = i + 1; j < nums.length; j++) {
            if (nums[i] + nums[j] == target) {
                result.push(i, j);
                return result;
            }
        }
    }
    return result;
}

console.log('Задание 4')

const nums = [2, 11, 7, 15];
const target = 9;

const result4 = summa(nums, target);
console.log(result4);

