document.addEventListener('DOMContentLoaded', () => {
    const loadMoreBtns = document.querySelectorAll('[data-load-more]') 
    const successModal = document.querySelector('#success-modal')
    const forms = document.querySelectorAll('[data-form]')
    const ajaxUrl = window.ajax.url

    loadMoreBtns.forEach((btn) => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();

            const { action, page } = btn.dataset
            const container = btn.parentElement.querySelector('[data-container]')
            const body = new FormData()

            if (!container || !action || !page ) return

            body.append('action', action)
            body.append('page', page)

            const req = await fetch(ajaxUrl, {
                method: 'POST',
                body
            })

            const resp = req.text()

            console.log(resp)
            container.insertAdjacentHTML('beforeend', resp)

            btn.dataset.page = parseInt(page) + 1
        })
    });

    forms.forEach((form) => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const body = new FormData(form)
            body.append('action', 'contact_form')

            const req = await fetch(ajaxUrl, {
                method: 'POST',
                body
            })

            const resp = await req.json()

            if (!resp.success) {
                alert(resp.message)
                return
            }

            const dialogs = document.querySelectorAll('dialog')
            dialogs.forEach(dialog => dialog.close())

            setTimeout(() => {
                successModal.showModal()    
            }, 300);



        })
    });
})