const shampo = document.querySelector(".shampo");
const creeme = document.querySelector(".creeme");
const lotion = document.querySelector(".lotion");

const helperFunction = (category)=>{
    fetch("http://localhost:9000/Product/findByCategory/"+category).then((res)=>res.json()).then((data)=>{
        const container = document.querySelector(".container");
        container.innerHTML = "";
        for(const tmp of data){
            const cart = document.createElement("div");
            cart.classList.add('w-fit');
            cart.innerHTML = `
            <img alt="image-${tmp.id}" src="http://localhost:9000/public/src/images/${tmp.image}" />
            <div class="w-full mt-5 border-black border-[2px] p-2">
                <div class="w-full flex justify-between items-center font-semibold">
                    <span>${tmp.name}</span>
                    <span>${tmp.price}$</span>
                </div>
                <p class="mt-2 text-gray-700">${tmp.description}</p>
            </div>
            `;
            container.appendChild(cart);
        }
    });
}

shampo.addEventListener("click", (e)=>{
    helperFunction("shampo");
});

lotion.addEventListener("click", (e)=>{
    helperFunction("lotion");
});

creeme.addEventListener("click", (e)=>{
    helperFunction("creeme");
});


//handle search

const searchInput = document.querySelector("input[name='search']");
console.log(searchInput);

searchInput.addEventListener("input", (e)=>{
    console.log("changed");
    if(e.target.value !== ""){
        fetch("http://localhost:9000/Product/findBySearch/"+e.target.value).then((res)=>res.json()).then((data)=>{
            const container = document.querySelector(".container");
            for(const tmp of data){
                const cart = document.createElement("div");
                cart.classList.add('w-fit');
                cart.innerHTML = `
                <img alt="image-${tmp.id}" src="http://localhost:9000/public/src/images/${tmp.image}" />
                <div class="w-full mt-5 border-black border-[2px] p-2">
                    <div class="w-full flex justify-between items-center font-semibold">
                        <span>${tmp.name}</span>
                        <span>${tmp.price}$</span>
                    </div>
                    <p class="mt-2 text-gray-700">${tmp.description}</p>
                </div>
                `;
                container.appendChild(cart);
            }
        });
    }else{
        helperFunction("all");
    }
});