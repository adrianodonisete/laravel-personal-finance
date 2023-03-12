(function () {
    const allSelCat = qAll('.sel-category');
    if (allSelCat) {
        for (const selCategory of allSelCat) {
            if (selCategory) {
                selCategory.addEventListener('change', () => setOperation(selCategory));
            }
        }

        const setOperation = obj => {
            const objOp = qs(`#${obj.getAttribute('operation-type')}`);
            if (objOp) {
                objOp.value = obj.value.toString().includes('expense') ? 'expenses' : 'entries';
            }
        };
    }
})();
