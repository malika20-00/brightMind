



// var test_labels = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12];
// var test_data = [86, 114, 106, 106, 107, 111, 133, 224, 78, 90,150,120];
// var ttest_data = [22, 25, 20, 18, 30, 71, 80, 41, 38, 30,40,35];
// var studentChart = new Chart("studentChart", {
//     type: "bar",
//     data: {labels: test_labels,
//         datasets: [{
//             data: test_data,
//             label: "student requests",
//             borderColor: "#66afff",
//             backgroundColor:'#66afff',
//             fill: false
//         }]},
//     options: {
//         legend: {display: false},
//         title: {
//         display: true,
//         text: 'student requests per month'
//     }}
//   });
//   var teacherChart = new Chart("teacherChart", {
//     type: "bar",
//     data: {labels: test_labels,
//         datasets: [{
//             data: ttest_data,
//             label: "Teacher requests",
//             borderColor: "#66afff",
//             backgroundColor:'#66afff',
//             fill: false
//         }]},
//     options: {
//         legend: {display: false},
//         title: {
//         display: true,
//         text: 'Teacher requests per month'
//     }}
//   });
//   function addData(chart, label, data) {
//     chart.data.labels.push(label);
//     chart.data.datasets.forEach((dataset) => {
//         dataset.data.push(data);
//     });
//     chart.update();
// }
// addData(studentChart,test_labels,test_data)