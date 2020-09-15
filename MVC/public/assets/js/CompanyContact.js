(() => {
    const lstCompany = document.getElementById('Company');
    const lstContact = document.getElementById('Contact');
    
    const contact = ()=>{
        const data = [];
        Array.from(lstContact.options).forEach(e => {
           data[e.value] = e.text;
        });
        return data;
    };
    const dataContact = contact();
    
    const companyBindContact = ()=>{
        lstContact.length = 0;
        const data = document.getElementById(`company-${lstCompany.value}`);
        data.attributes.getNamedItem('data-contact').value.split('-').forEach(e => {
            const opt = document.createElement('option');
            opt.value = e;
            opt.text = dataContact[e];
            lstContact.appendChild(opt);
        });
    };
    
    lstCompany.addEventListener("change", companyBindContact);

    companyBindContact();
})();