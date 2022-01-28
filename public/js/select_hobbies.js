let checks = document.querySelectorAll(".control");
let max = 3;
for (let i = 0; i < checks.length; i++)
    checks[i].onclick = selectiveCheck;

function selectiveCheck(event) {
    let checkedChecks = document.querySelectorAll(".control input:checked");
    if (checkedChecks.length >= max + 1)
        return false;
}