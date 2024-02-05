const Bbs_teamA = document.getElementById("Bbs_teamA");
const Bbs_Sulf = document.getElementById("Bbs_Sulf");
const Bbswa = document.getElementById("Bbswa");        

const updateBbswa = () => {
  const sum = Number(Bbs_teamA.value) + Number(Bbs_Sulf.value);
  Bbswa.value = sum;
};
Bbs_teamA.addEventListener("input", () => {
  updateBbswa();
});
Bbs_Sulf.addEventListener("input", () => {
  updateBbswa();
});

const Kol_zam_teamA = document.getElementById("Kol_zam_teamA");
const Kol_zam_Sulf = document.getElementById("Kol_zam_Sulf");
const Kol_vo_zam = document.getElementById("Kol_vo_zam");        

const update_Kol_vo_zam = () => 
{
    const sum = Number(Kol_zam_teamA.value) + Number(Kol_zam_Sulf.value);
    Kol_vo_zam.value = sum;
};

Kol_zam_teamA.addEventListener("input", () => {
  update_Kol_vo_zam();
});
Kol_zam_Sulf.addEventListener("input", () => {
  update_Kol_vo_zam();
});