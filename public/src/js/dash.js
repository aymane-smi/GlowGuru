//handling add form

const multiForm = document.querySelector(".multi-form");
const btns = document.querySelector(".buttons");

const arrow = document.querySelector(".fa-chevron-up");

const getList = document.querySelector(".get-list");

const getadd = document.querySelector(".get-add");

const getSettings = document.querySelector(".get-settings");

const ProductCounter = document.querySelector(".count-products");

getList.addEventListener("click", ()=>{
    document.querySelector(".lists").classList.remove("hidden");
    document.querySelector(".add").classList.add("hidden");
    document.querySelector(".setting").classList.add("hidden");
});

getadd.addEventListener("click", ()=>{
    document.querySelector(".add").classList.remove("hidden");
    document.querySelector(".lists").classList.add("hidden");
    document.querySelector(".setting").classList.add("hidden");
});

getSettings.addEventListener("click", ()=>{
    document.querySelector(".setting").classList.remove("hidden");
    document.querySelector(".lists").classList.add("hidden");
    document.querySelector(".add").classList.add("hidden");
});

arrow.addEventListener("click", (e)=>{
    e.target.classList.toggle("rotate-180");
    e.target.parentNode.parentElement.childNodes[3].classList.toggle("hidden");
});

let counter = 1;

document.querySelectorAll(".add-product").forEach((e)=>{
    e.addEventListener("click", ()=>{
        let newElement = document.createElement("div");
        newElement.classList.add(...["w-1/2", "mt-3"]);
        newElement.id = `form-id-${++counter}`;
        newElement.innerHTML = `<div class="flex justify-between items-center border-2 p-3">
        <div>
            <i class="fa-solid fa-plus"></i>
            <span class="font-semibold">
                Product <span class="product-counter">${counter}</span>
            </span>
        </div>
        <i class="fa-solid fa-chevron-up"></i>
    </div>
    <div class="flex flex-col gap-5 border-2 border-t-0 p-3">
        <div class="flex flex-col gap-2">
            <label for="name" class="font-semibold">Name</label>
            <input class="p-2 border-2 rounded-md" type="text" name="name[]" required id="name" />
        </div>
        <div class="flex flex-col gap-2">
            <label for="price" class="font-semibold">Price</label>
            <input class="p-2 border-2 rounded-md" type="text" name="price[]" required id="price" />
        </div>
        <div class="flex flex-col gap-2">
            <label for="category" class="font-semibold">Category</label>
            <select name="category[]" required class="p-2 bg-white border-2 rounded-md" id="category">
                <option value="shampo" selected>Shampo</option>
                <option value="lotion">lotion</option>
                <option value="creeme">creeme</option>
            </select>
        </div>
        <div class="flex flex-col gap-2">
            <label class="font-semibold" for="description">Description</label>
            <textarea name="description[]" required class="p-2 bg-white border-2 rounded-md"></textarea>
        </div>
        <input type="file" name="image[]" required />
        <div class="p-2 rounded-md text-white bg-red-500 font-semibold w-fit cursor-pointer" onclick="removeForm('form-id-${counter}')">Delete form</div>
    </div>`;
    newElement.childNodes[0].childNodes[3].addEventListener("click", (e)=>{
        e.target.classList.toggle("rotate-180");
        e.target.parentNode.parentElement.childNodes[2].classList.toggle("hidden");
    });
    multiForm.insertBefore(newElement, btns);
    });
    //console.log(document.querySelector(`#delete-form-${counter}`));
});

const removeForm  = (id)=>{
    document.que
    document.querySelector(`#${id}`).remove();
    --counter;
}

multiForm.addEventListener("submit", async(e)=>{
    e.preventDefault();
    let formData = new FormData();
    formData.append("names", handleInput(document.querySelectorAll("input[name='name[]']")));
    formData.append("prices", handleInput(document.querySelectorAll("input[name='price[]']")));
    formData.append("descriptions", handleInput(document.querySelectorAll("textarea[name='description[]']")));
    formData.append("categories", handleInput(document.querySelectorAll("select[name='category[]']")))
    //formData.append("images", handleFile());
    handleFile(formData);
    try{
        await fetch("http://localhost:9000/Dashboard/addProduct", {
            method: "POST",
            body: formData,
        });
        fetch("http://localhost:9000/Dashboard/Products").then((res)=>res.json()).then((data)=>{
            //const head = document.querySelector(".table-head");
            const list_container = document.querySelector(".list-container");

            for(const tmp of data){
                const element = document.createElement("div");
                let classes = `list-${tmp.id} grid grid-cols-6 border-[2px] rounded-md font-semibold mt-2 p-3 ${(tmp.id +1)%2 && "bg-gray-100" } max-[1000px]:grid-cols-1 max-[1000px]:grid-rows-6`;
                element.classList.add(...classes.split(" "));
                element.innerHTML = `
                <div class="flex justify-center items-center">
                <img class="w-[80px] h-[80px] rouneded-[50%]" alt="image alternative" src="http://localhost:9000/public/src/images/${tmp.image}" />
                </div>
                <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                    ${tmp.name}
                </div>
                <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                    ${tmp.category}
                </div>
                <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                    ${tmp.price}
                </div>
                <div class="flex justify-center items-center rounded-sm max-[1000px]:border-t-[2px]">
                    ${tmp.description}
                </div>
                <div class="flex justify-center items-center rounded-sm gap-5 max-[1000px]:border-t-[2px]">
                    <div class="p-2 bg-orange-500 text-white rounded-md clicked-list" id="${tmp.id}">
                        <i class="fa-solid fa-pen" id="${tmp.id}"></i>
                    </div>
                    <form class="p-2 bg-red-500 text-white rounded-md delete">
                        <input type="hidden" name="delete-id" value="${tmp.id}" />
                        <button>
                            <i class="fa-solid fa-trash delete"></i>
                        </button>
                    </form>
                </div>
                `;
                list_container.appendChild(element);
            }
            ProductCounter.innerText = Number.parseInt(ProductCounter.innerText) + JSON.parse(formData.get("names")).length;
            counter = 1;
            document.querySelector(".add").classList.add("hidden");
            document.querySelector(".lists").classList.remove("hidden");
        });
    }catch(err){
        console.log(err);
    }

});


const handleInput = (arr)=>{
    let tmp = [];
    for(const value of arr)
        tmp.push(value.value);
    tmp.shift();
    return JSON.stringify(tmp);
};

const handleFile = (formdata)=>{
    for(const value of document.querySelectorAll("input[name='image[]']")){
        formdata.append("images[]", value.files[0]);
    }
}


//handling settings form


const settings = document.querySelector(".settings");


settings.addEventListener("submit", (e)=>{
    e.preventDefault();
    let formData = new FormData();
    formData.append("username", document.querySelector("input[name='username']").value);
    formData.append("password", document.querySelector("input[name='password']").value);
    formData.append("id", document.querySelector("input[name='id']").value)

    try{
        fetch("http://localhost:9000/Dashboard/editAdmin", {
            method: "POST",
            body: formData,
        });
        let timeCounter = 0;
        const flash = document.querySelector(".flash");
        const progress = document.querySelector(".progress");
        flash.classList.remove("hidden");
        const interval = setInterval(()=>{
            if(timeCounter === 1500){
                flash.classList.add("hidden");
                clearInterval(interval);
            }
            timeCounter+=10;
            progress.style.width = (timeCounter/1500)*100+"%";
        }, 10);
    }catch(err){
        console.log(err);
    }
});


//handle edit form

const row = document.querySelectorAll(".clicked-list");
const popup = document.querySelector(".popup");

//console.log(popup);


for(const tmp of row){
    tmp.addEventListener("click", (e)=>{
        fetch("http://localhost:9000/Dashboard/Product/"+e.target.id).then((res)=>res.json()).then((data)=>{
            document.querySelector(".popup-name").value = data.name;
            document.querySelector(".popup-price").value = data.price;
            document.querySelector(".popup-id").value = data.id;
            document.querySelector(".popup-category").value = data.category;
            document.querySelector(".popup-description").value = data.description;
        });
        popup.classList.remove("hidden");
    });
}

//handle edit of popup

popup.addEventListener("submit", (e)=>{
    e.preventDefault();
    let formData = new FormData();
    let id = document.querySelector(".popup-id").value;
    formData.append("name", document.querySelector(".popup-name").value);
    formData.append("price", document.querySelector(".popup-price").value);
    formData.append("category", document.querySelector(".popup-category").value);
    formData.append("description", document.querySelector(".popup-description").value);
    fetch("http://localhost:9000/Dashboard/editProduct/"+id, {
        method: "POST",
        body: formData,
    });
    const tmp = document.querySelector(".list-"+id);
    tmp.childNodes[3].innerText = document.querySelector(".popup-name").value;
    tmp.childNodes[5].innerText = document.querySelector(".popup-category").value;
    tmp.childNodes[7].innerText = document.querySelector(".popup-price").value;
    tmp.childNodes[9].innerText = document.querySelector(".popup-description").value;
    popup.classList.add("hidden");
});

//handle delete

const deletes = document.querySelectorAll(".delete");

for(const tmp of deletes){
    tmp.addEventListener("submit", (e)=>{
        e.preventDefault();
        const id = e.target.childNodes[1].value;
        fetch("http://localhost:9000/Dashboard/deleteProduct/"+id,{
            method: "POST",
        });
        ProductCounter.innerText = Number.parseInt(ProductCounter.innerText)-1;
        document.querySelector(".list-"+id).remove();
    });
}