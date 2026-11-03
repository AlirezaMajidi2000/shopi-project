let nameInput = document.querySelector('.input_name')
let phoneInput = document.querySelector('.input_phone')
let addressInput = document.querySelector('.input_address')

// انتخاب استان و شهرستان

const provinceSelect = document.getElementById("province");
const citySelect = document.getElementById("city");


// بارگذاری اطلاعات استان‌ها و شهرستان‌ها


function addOption(select, value, text) {
  const option = document.createElement("option");
  option.value = value;
  option.textContent = text;
  select.appendChild(option);
}

function loadProvinces() {
  provinceSelect.replaceChildren();
  addOption(provinceSelect, "", "استان را انتخاب کنید");

  provinces.forEach(province => {
    addOption(provinceSelect, province.id, province.name);
  });

  citySelect.replaceChildren();
  addOption(citySelect, "", "ابتدا استان را انتخاب کنید");
  citySelect.disabled = true;
}

provinceSelect.addEventListener("change", function () {
  const selectedProvinceId = this.value;

  citySelect.replaceChildren();
  addOption(citySelect, "", "شهرستان را انتخاب کنید");

  if (!selectedProvinceId) {
    citySelect.disabled = true;
    return;
  }

  const filteredCounties = counties.filter(
    county => String(county.province_id) === selectedProvinceId
  );

  filteredCounties.forEach(county => {
    addOption(citySelect, county.id, county.name);
  });

  citySelect.disabled = filteredCounties.length === 0;

  if (filteredCounties.length === 0) {
    citySelect.replaceChildren();
    addOption(citySelect, "", "شهرستانی برای این استان ثبت نشده");
  }
});

loadProvinces();

// انتخاب استان و شهرستان

// اعتبارسنجی ها

// اعتبارسنجی نام و نام خانوادگی

nameInput.addEventListener('input' , function(){
  validateInput(nameInput , nameRegex)
})

// اعتبارسنجی نام و نام خانوادگی

// اعتبارسنحی شماره تماس

phoneInput.addEventListener('input' , function(){
  validateInput(phoneInput , phoneRegex)
})

// اعتبارسنحی شماره تماس

// اعتبارسنجی آدرس

addressInput.addEventListener('input' , function(){
  validateInput(addressInput , addressRegex)
})

// اعتبارسنجی آدرس