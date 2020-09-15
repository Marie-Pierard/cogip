(() => {
    const lstCompany = document.getElementById('Company');

    const companyBindContact = ()=>{
        const data = document.getElementById(`company-${lstCompany.value}`);
        console.log(data);
    };

    lstCompany.addEventListener("change", companyBindContact);
})();