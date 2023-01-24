const shampo = document.querySelector(".shampo");
const creeme = document.querySelector(".creeme");
const lotion = document.querySelector(".lotion");

const helperFunction = (e, category)=>{
    fetch("http://localhost:9000/findByCategory/"+category).then((res)=>res.json()).then((data)=>{
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
            e.target.appendChild(cart);
        }
    });
}

shampo.addEventListener("click", (e)=>{
    helperFunction(e, "shampo");
});

lotion.addEventListener("click", (e)=>{
    helperFunction(e, "lotion");
});

creeme.addEventListener("click", (e)=>{
    helperFunction(e, "creeme");
});