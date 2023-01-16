let ChartValue = document.getElementsByClassName("chartValue");
new Chart(document.getElementById("bar-chart-horizontal"), {
  type: "horizontalBar",
  data: {
    labels: ["일", "월", "화", "수", "목", "금", "토"],
    datasets: [
      {
        label: "Population (millions)",
        backgroundColor: [
          "#4AC5D9",
          "#1096A4",
          "#086E7A",
          "#0E6078",
          "#0C5173",
          "#064465",
          "#0B3456",
        ],
        data: [
          ChartValue[0].value,
          ChartValue[1].value,
          ChartValue[2].value,
          ChartValue[3].value,
          ChartValue[4].value,
          ChartValue[5].value,
          ChartValue[6].value,
        ],
      },
    ],
  },
  options: {
    legend: {
      display: false,
    },
    title: {
      responsive: false,
      display: true,
      text: "",
    },
  },
});
