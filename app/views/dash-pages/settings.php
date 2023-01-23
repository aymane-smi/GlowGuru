<div class="width flex justify-center items-center flex-col">
    <div class="flash my-4 bg-green-400 rounded-md font-semibold text-white overflow-hidden hidden">
        <span class="p-4 block">credentials updated!</span>
        <div class="h-[3px] bg-blue-100 progress"></div>
    </div>
    <form class="p-4 border-[2px] rounded-md w-[40%] settings">
        <p class="w-full text-center font-semibold">
            Edit Settings
        </p>
        <div class="flex flex-col gap-3 mt-4">
            <label id="username" class="font-semibold">Username</label>
            <input type="text" name="username" class="p-2 border-[2px] rounded-md" id="username" value="<?php echo $data["admin"]->username; ?>" />
        </div>
        <div class="flex flex-col gap-3 mt-4">
            <label id="password" class="font-semibold">Password</label>
            <input type="password" name="password" class="p-2 border-[2px] rounded-md" id="password" />
        </div>
        <input type="hidden" name="id" value="<?php echo $data['admin']->id; ?>" />
        <div class="w-full flex justify-center items-center mt-3">
            <button class="bg-orange-400 p-2 font-semibold text-white rounded-md mx-auto">edit</button>
        </div>
    </form>
</div>