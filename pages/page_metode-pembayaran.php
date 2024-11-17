<h1>Metode Pembayaran</h1>

<div class="daftar-metode-pembayaran">
    <h4>daftar metode pembayaran yagn tersedia</h4>
    <img src="../assets/image/icon-dana.png" alt="" width="200px">
</div>

<div class="chartPembayaran">
    <canvas id="pembayaran"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const data = {
  labels: [
    'Transfer Bank',
    'Kartu Kredit',
    'E-Wallet'
  ],
  datasets: [{
    label: 'Total Pembayaran',
    data: [300, 50, 100],
    backgroundColor: [
      '#ddd',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
const ctx = document.getElementById('pembayaran').getContext('2d');
new Chart(ctx, {
  type: 'doughnut',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>