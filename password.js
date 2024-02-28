function showPassword() {
  var password = document.getElementById("pass");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}

function walkDog(callback) {
  setTimeout(() => {
    console.log("Walk the dog");
    callback();
  }, 3000);
}

function cleanHouse(callback) {
  setTimeout(() => {
    console.log("cleanhouse the house");
    callback();
  }, 1000);
}

walkDog(() => {
  cleanHouse(() => {
    console.log("you completed the task");
  });
});
