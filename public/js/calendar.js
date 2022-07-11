// let today = new Date();
// let monthName = today.toLocaleString('default', { month: 'long'});
// document.getElementById('monthName').innerHTML = monthName;

let days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
let dayName = document.getElementById('dayNames')

for (let i = 0; i < days.length; i++) {
    let eachDayName = document.createElement('th');
    eachDayName.textContent = days[i];
    dayName.append(eachDayName); 
}

let startDate = new Date('January 1, 2000');
let endDate = new Date('December 31, 2050')
const dateInMonth = document.getElementById('dates')

for (let i = 1; i <= 31; i++) {
    dateInMonth.insertAdjacentHTML('beforeend', `<td>${i}</td>`);
}

console.log(dates())