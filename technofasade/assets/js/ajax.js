document.addEventListener('DOMContentLoaded', () => {
    const loadMoreBtns = document.querySelectorAll('[data-load-more]') 
    const successModal = document.querySelector('#success-modal')
    const forms = document.querySelectorAll('[data-form]')
	const testimonialsReadLinks = document.querySelectorAll('[data-testimonial]')
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
			
			const inputs = form.querySelectorAll('input')
			let valid = true
	
			inputs.forEach(input => {
				input.closest('.input')?.classList.remove('input--error')
				
				if (input.minLength !== -1) {
					if (input.value.length < input.minLength) {
						input.closest('.input')?.classList.add('input--error')
						input.focus()
						valid = false
					}
				}
			})
				
			if (!valid) return

            const req = await fetch(ajaxUrl, {
                method: 'POST',
                body
            })

            const resp = JSON.parse(await req.text())

            console.log(resp)

            if (!resp.success) {
                alert(resp.message)
                return
            }

            const dialogs = document.querySelectorAll('dialog')
            dialogs.forEach(dialog => dialog.close())

            setTimeout(() => {
                form.reset()
                successModal.showModal()    
            }, 300);



        })
    });
	
	testimonialsReadLinks.forEach((el) => {
		const testimonialModal = document.querySelector('#testimonial-modal')
		const modalContent = testimonialModal.querySelector('[data-testimonial-content]')
		
		if (!testimonialModal) return
		
		el.addEventListener('click', async (e) => {
			e.preventDefault();
			
			const id = el.dataset.testimonial
			if (!id) return
			
			const body = new FormData()
            body.append('action', 'get_full_testimonial')
			body.append('id', id)

            const req = await fetch(ajaxUrl, {
                method: 'POST',
                body
            })
			
			const resp = await req.text()
			
			modalContent.innerHTML = resp
			
			testimonialModal.showModal()
			
		})
	})	
	
})