(function () {
    const allSelCat = qAll('.sel-category');
    const allBtnDelete = qAll('.btn-delete');
    const allBtnCancelDelete = qAll('.btn-cancel-delete');
    const allBtnConfirmDelete = qAll('.btn-confirm-delete');

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

    if (allBtnDelete) {
        for (const btnDelete of allBtnDelete) {
            if (btnDelete) {
                btnDelete.addEventListener('click', () => confirmDeleteLine(btnDelete));
            }
        }
    }

    if (allBtnCancelDelete) {
        for (const btnCancel of allBtnCancelDelete) {
            if (btnCancel) {
                btnCancel.addEventListener('click', () => resetAllDeleteButtons());
            }
        }
    }

    if (allBtnConfirmDelete) {
        for (const btnConfirm of allBtnConfirmDelete) {
            if (btnConfirm) {
                btnConfirm.addEventListener('click', () => deleteLineExec(btnConfirm));
            }
        }
    }

    const confirmDeleteLine = obj => {
        const key = obj.getAttribute('data-key');
        const objBox = qs(`#box_${key}`);

        resetAllDeleteButtons();

        setDisplay(obj, 'none');
        setDisplay(objBox, '');
    };

    const deleteLineExec = obj => {
        const key = obj.getAttribute('data-key');
        qs(`#tr_${key}`).remove();
        resetAllDeleteButtons();
    };

    const resetAllDeleteButtons = () => {
        setDisplayAll('.btn-delete', '');
        setDisplayAll('.box-confirm-delete', 'none');
    };

    const setDisplay = (obj, display) => {
        if (obj) {
            obj.style.display = display;
        }
    };

    const setDisplayAll = (query, display) => {
        const allObj = qAll(query);
        if (allObj) {
            for (const obj of allObj) {
                if (obj) {
                    obj.style.display = display;
                }
            }
        }
    };
})();
