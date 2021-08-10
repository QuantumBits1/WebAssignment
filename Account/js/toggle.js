const navItems = document.getElementsByClassName('nav-link')

for (let index = 0; index < navItems.length; index++) {
    const element = navItems[index];
    element.addEventListener('click', toggle);
}

function toggle(event) {
    event.currentTarget.className += " active"
    console.log(event.currentTarget)
    console.log(event.currentTarget.className)
}