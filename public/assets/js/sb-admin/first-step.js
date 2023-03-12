(function () {
    const listOperations = qs('#list_operations');
    const btSubmit = qs('#bt-submit');
    const frmEntries = qs('#frm-entries');

    if (listOperations) {
        listOperations.addEventListener('change', () => cleanOperations());
        const cleanOperations = () => {
            listOperations.value = listOperations.value.toString().replace(/\t/g, ';');
        };
    }

    if (btSubmit && frmEntries && listOperations) {
        btSubmit.addEventListener('click', () => {
            const value = listOperations.value.toString().trim();
            if (value == '') {
                fnShowError('');
            } else {
                fnShowError('none');
                frmEntries.submit();
            }
        });
    }
})();

function fnShowError(display) {
    const showError = qs('#show-error');
    if (showError) {
        showError.style.display = display || '';
    }
}
