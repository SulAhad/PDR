
function fetchData()

    {
        var loader = document.getElementById("loader");
        loader.style.display = "block"; // Отображаем лоадер
        var noLoader = document.getElementById("noLoader");
        var previousTransform = noLoader.style.transform;  // сохраняем предыдущее значение
        var selectedDate = document.getElementById("selectedDate").value;
        var xhttpSafety = new XMLHttpRequest();
        var xhttpQuality = new XMLHttpRequest();
        var xhttpTechnology = new XMLHttpRequest();
        var xhttpProduction = new XMLHttpRequest();
        var xhttpProductionTeamB = new XMLHttpRequest();
        var xhttpSulfirovanie = new XMLHttpRequest();
        var xhttpSirye = new XMLHttpRequest();
        var xhttpWater = new XMLHttpRequest();
        var xhttpTop5Problem = new XMLHttpRequest();
        var xhttpInspectionList = new XMLHttpRequest();
        var xhttpEnergoresurs = new XMLHttpRequest();
        xhttpInspectionList.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableInspection").innerHTML = this.responseText;}};
        xhttpSafety.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableSafety").innerHTML = this.responseText;}};
        xhttpQuality.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableQuality").innerHTML = this.responseText;}};
        xhttpTechnology.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            { document.getElementById("tableTechnology").innerHTML = this.responseText;}};
        xhttpProduction.onreadystatechange = function()
        { if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableProduction").innerHTML = this.responseText;}};
        xhttpProductionTeamB.onreadystatechange = function()
        { if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableProductionTeamB").innerHTML = this.responseText;}};
        xhttpSulfirovanie.onreadystatechange = function()
        { if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableSulfirovanie").innerHTML = this.responseText;}};
        xhttpSirye.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableSirye").innerHTML = this.responseText;}};
        xhttpWater.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableWater").innerHTML = this.responseText;}};
        xhttpTop5Problem.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableTop5Problem").innerHTML = this.responseText;}};
          xhttpEnergoresurs.onreadystatechange = function()
        {if (this.readyState == 4 && this.status == 200)
            {document.getElementById("tableEnergoresurs").innerHTML = this.responseText;}};
        xhttpSafety.open("GET", "../Engels/index/fetchDataSafety.php?date=" + selectedDate, true);
        xhttpQuality.open("GET", "../Engels/index/fetchDataQuality.php?date=" + selectedDate, true);
        xhttpTechnology.open("GET", "../Engels/index/fetchDataTechnology.php?date=" + selectedDate, true);
        xhttpProduction.open("GET", "../Engels/index/fetchDataProduction.php?date=" + selectedDate, true);
        xhttpProductionTeamB.open("GET", "../Engels/index/fetchDataProductionTeamB.php?date=" + selectedDate, true);
        xhttpSulfirovanie.open("GET", "../Engels/index/fetchDataSulfirovanie.php?date=" + selectedDate, true);
        xhttpSirye.open("GET", "../Engels/index/fetchDataSirye.php?date=" + selectedDate, true);
        xhttpWater.open("GET", "../Engels/index/fetchDataWater.php?date=" + selectedDate, true);
        xhttpTop5Problem.open("GET", "../Engels/index/fetchDataTop5Problem.php?date=" + selectedDate, true);
        xhttpInspectionList.open("GET", "../Engels/index/fetchDataInspectionList.php?date=" + selectedDate, true);
        xhttpEnergoresurs.open("GET", "../Engels/index/fetchDataEnergoresurs.php?date=" + selectedDate, true);
        tableTechnology.classList.add("loading");
        tableWater.classList.add("loading");
        tableSafety.classList.add("loading");
        tableInspection.classList.add("loading");
        tableQuality.classList.add("loading");
        tableProduction.classList.add("loading");
        tableProductionTeamB.classList.add("loading");
        tableSulfirovanie.classList.add("loading");
        tableSirye.classList.add("loading");
        tableTop5Problem.classList.add("loading");
        tableEnergoresurs.classList.add("loading");
        xhttpEnergoresurs.send();
        xhttpSafety.send();
        xhttpQuality.send();
        xhttpTechnology.send();
        xhttpProduction.send();
        xhttpProductionTeamB.send();
        xhttpSulfirovanie.send();
        xhttpSirye.send();
        xhttpWater.send();
        xhttpTop5Problem.send();
        xhttpInspectionList.send();
        
        // Скрываем лоадер после получения ответов
        var numberOfRequests = 11;
        var completedRequests = 0;
        
        xhttpInspectionList.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableInspection").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpSafety.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableSafety").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpQuality.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableQuality").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpTechnology.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableTechnology").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpProduction.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableProduction").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpProductionTeamB.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableProductionTeamB").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpSulfirovanie.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableSulfirovanie").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpSirye.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableSirye").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpWater.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableWater").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpTop5Problem.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableTop5Problem").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        xhttpEnergoresurs.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tableEnergoresurs").innerHTML = this.responseText;
            completedRequests++;
            checkIfAllRequestsCompleted();
          }
        };
        function checkIfAllRequestsCompleted() {
          if (completedRequests === numberOfRequests) {
            setTimeout(function() {
              noLoader.style.transform = previousTransform;
              loader.style.display = "none";
            }, 2000);
          }
        }
       
    }
    