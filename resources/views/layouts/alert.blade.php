<!-- 失敗または削除時のアラート  -->
@if (session('error'))
    <div class="flex justify-between items-center p-4 mb-6 text-red-700 bg-red-100 rounded-sm dark:bg-red-200 dark:text-red-800" role="alert">
        <div class="text-sm">
            <i class="fas fa-check-circle"></i>
            <span class="font-bold">{{ session('error') }}</span>
        </div>
        <div class="text-base cursor-pointer alert-del">
            <i class="fas fa-times"></i>
        </div>
    </div>
@endif

<!-- 成功時のアラート  -->
@if (session('status')) 
    <div class="flex justify-between items-center p-4 mb-6 text-green-700 bg-green-100 rounded-sm dark:bg-green-200 dark:text-green-800" role="alert">
        <div class="text-sm">
            <i class="fas fa-check-circle"></i>
            <span class="font-bold">{{ session('status') }}</span>
        </div>
        <div class="text-base cursor-pointer alert-del">
            <i class="fas fa-times"></i>
        </div>
    </div>
@endif 

<script>
    let alertDel = document.querySelectorAll('.alert-del');

    alertDel.forEach((x) => {
        x.addEventListener('click', () => 
            x.parentElement.classList.add('hidden'));
    });
</script>