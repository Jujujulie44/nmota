
	
 <li class="menu-item-59">
 <a href="#Contact">Contact</a>
 </li>   
 /***********************************************************************************************/
 const menuItems = document.querySelectorAll(".menu-item-59 a, .contact-btn");
 menuItems.forEach((link) => {
   link.addEventListener("click", (event) => {
	 console.log("click");
   });
 });


