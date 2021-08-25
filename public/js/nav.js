let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let searchbtn = document.querySelector(".bx-search");

btn.onclick = function(){
    sidebar.classList.toggle("active");  
};
// searchbtn.onclick = function(){
//     sidebar.classList.toggle("active");  
// };

const currentLocation = location.href;
const menuItem = document.querySelectorAll('#navList');
const menuLength = menuItem.length;
console.log(menuItem.length);

for(let i=0; i<menuLength; i++)
{
    if(menuItem[i].href === currentLocation)
    {
        menuItem[i].className = "active";
    }
}

