let itemName='';
let itemPrice='';
let itemSrc='';
let myArray =[];

 function showmodal(id,product_name, product_type, product_price, product_image, product_description, product_size){

       document.querySelector('.item-slick3').setAttribute("data-thumb",product_image);
       
       document.querySelector('#js_ahref').setAttribute('href',product_image);//full screen button
       document.querySelector('#modalProductInfo').innerHTML=product_description;
       document.querySelector('#modalProductPrice').innerHTML = '₱'+product_price+'.00';
       document.querySelector('#modalMainImage').setAttribute("src",product_image);
       document.querySelector('#modalProductName').innerHTML = product_name;

        b = product_size.replace(/tmpdq/g, '"'); //replace the added tmpdq, originally it is single quote and change to tmpdq
        b = b.replace(/'/g, ""); //replance the remaining single quote to be able to json parse it
       
        b = JSON.parse(b);
       console.log(b);
       let html='	<option disabled selected>Choose an option</option>';
      for(let ctr=0; ctr<b.length; ctr++){
            html +=`<option>${b[ctr]}</option>`;
            document.querySelector('#js-select2').innerHTML =html;    
      } 
               
 }
       
 /*

<option>Choose an option</option>
<option>Small</option>
<option>Large (not crimp)</option>

 */