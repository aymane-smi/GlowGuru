const multiForm = document.querySelector(".multi-form");
const btns = document.querySelector(".buttons");

let counter = 1;

document.querySelectorAll(".add-product").forEach((e)=>{
    e.addEventListener("click", ()=>{
        let newElement = document.createElement("div");
        newElement.classList.add(...["w-1/2", "mt-3"]);
        newElement.innerHTML = `<div class="flex justify-between items-center border-2 p-3">
        <div>
            <i class="fa-solid fa-plus"></i>
            <span class="font-semibold">
                Product <span class="product-counter">${++counter}</span>
            </span>
        </div>
        <i class="fa-solid fa-chevron-down"></i>
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
    </div>`;
    multiForm.insertBefore(newElement, btns);
    });
});

multiForm.addEventListener("submit", (e)=>{
    e.preventDefault();
    let formData = new FormData();
    formData.append("names", handleInput(document.querySelectorAll("input[name='name[]']")));
    formData.append("prices", handleInput(document.querySelectorAll("input[name='price[]']")));
    formData.append("descriptions", handleInput(document.querySelectorAll("textarea[name='description[]']")));
    formData.append("categories", handleInput(document.querySelectorAll("select[name='category[]']")))
    //formData.append("images", handleFile());
    handleFile(formData);
    fetch("http://localhost:9000/Dashboard/addProduct", {
        method: "POST",
        // headers:{
        //     'content-type': "multipart/form-data",
        // },
        body: formData,
    })
});


const handleInput = (arr)=>{
    let tmp = [];
    for(const value of arr)
        tmp.push(value.value);
    console.log(tmp);
    return JSON.stringify(tmp);
};

const handleFile = (formdata)=>{
    // let tmp = [];
    // for(const value of document.querySelectorAll("input[name='image[]']")){
    //     tmp.push(value.files[0]);
    // }
    // console.log(tmp);
    // return tmp;
    for(const value of document.querySelectorAll("input[name='image[]']")){
        formdata.append("images[]", value.files[0]);
    }
}