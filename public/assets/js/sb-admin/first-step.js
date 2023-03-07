(function () {
    const listOperations = qs('#list_operations');
    if (listOperations) {
        listOperations.addEventListener('change', () => cleanOperations());
        const cleanOperations = () => {
            listOperations.value = listOperations.value.toString().replace(/\t/g, ';');
        };
    }
})();
