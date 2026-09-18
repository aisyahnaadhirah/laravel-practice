const name = "Aisyah Naadhirah";
const role = "Software Developer Intern";
console.log("Name:", name);
console.log("Role:", role);


function introduce(name, role){
    return `Hello, my name is ${name} and I am a ${role}.`;
}
console.log(introduce(name, role));


const skills = ["PHP", "Laravel", "JavaScript"];
console.log("My Skills:");
skills.forEach(function(skill) {
    console.log(skill);
});


const student = {
    name: "Aisyah Naadhirah",
    course: "Software Development",
    year: 4
};
console.log("Student Information:");
console.log("Name:", student.name);
console.log("Course:", student.course);
console.log("Year:", student.year);


function info(name, course){
    console.log(`My name is ${name} and I study ${course}.`);
}
info(student.name, student.course);
if (student.year >= 4){
    console.log("Final year student");
} else {
    console.log("Not a final year student");
}


const calculateAge = (birthYear, currentYear) => {
    return currentYear - birthYear;
};
console.log("Age:", calculateAge(2004, 2026));


const upperSkills = skills.map((skill) => {
    return skill.toUpperCase();
});
console.log("Uppercase Skills:", upperSkills);


const longSkills = skills.filter((skill) => {
    return skill.length > 3;
});
console.log("Long Skills:", longSkills);