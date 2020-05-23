// var SubjectArray = [];
var count = 1;
var SubjectArray = new Set();
var temp = [];
type="text/javascript";

function addSubject(current){
    if(count === 1) {
        temp.push(current.name);
        document.getElementById(current.id).style.backgroundColor = '#0ec20a';
        document.getElementById(current.id).innerHTML = "Unenroll";
        count = 0;
    }
    else {
        temp.push(current.name);
        document.getElementById(current.id).style.backgroundColor = '#42a8ff';
        document.getElementById(current.id).innerHTML = "Enroll";
        count = 1;
    }
}

Array.prototype.contains = function(v) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] === v) return true;
    }
    return false;
};

Array.prototype.unique = function() {
    var arr = [];
    for (var i = 0; i < this.length; i++) {
        if (!arr.contains(this[i])) {
            arr.push(this[i]);
        }
    }
    return arr;
}

function test(song) {
    if(temp.length == 0){
        alert("Please Choose subject");
        return;
    }
    var uniques = temp.unique();
    alert("You have successfully registered");
    $(document).ready(function () {
        createCookie("gfg", uniques, "1");
    });

    function createCookie(name, value, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }

        document.cookie = escape(name) + "=" +
            escape(value) + expires + "; path=/";
    }
}
