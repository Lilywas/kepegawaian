<script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  //inisialisasi buat label dan data chart
  <?php
  $aa = "";
  $bb = "";
  $cc = "";
  $dd = "";
  $ee = "";
  $ff = "";
  $gg = "";
  $hh = "";

  $totalpn = null;
  $totaljk = null;
  $totaljab = null;
  $totalpend = null;
  $totalagama = null;
  $totaljabnon = null;
  $totalkomp = null;

  //label dan data grafik jenis pegawai////////////////////////////////////
  foreach ($status as $item) {
    // $st=$item->status;
    if ($item->status == 'n') {
      $st = 'Non-PNS';
    } else {
      $st = 'PNS';
    }
    $aa .= "'$st'" . ", ";
    $jum = $item->jumlah;
    $totalpn .= "$jum" . ", ";
  }

  //label dan data grafik jenis kelamin ///////////////////////////////////////////
  foreach ($jk as $item) {
    $st = $item->jk;
    $bb .= "'$st'" . ", ";
    $jum = $item->jumlah;
    $totaljk .= "$jum" . ", ";
  }

  //label dan data grafik pendidikan terkahir pegawai /////////////////////////////////////////
  foreach ($pend as $item) {
    $st = $item->pend_terakhir;
    $dd .= "'$st'" . ", ";
    $jum = $item->jumlah;
    $totalpend .= "$jum" . ", ";
  }

  //label dan data grafik agama ///////////////////////////////////////////////////
  foreach ($agama as $item) {
    $st = $item->agama;
    $ee .= "'$st'" . ", ";
    $jum = $item->jumlah;
    $totalagama .= "$jum" . ", ";
  }

  //data grafik usia pegawai ///////////////////////////////////////////////////
  $satu = 0; //18-30
  $dua = 0; //31-40
  $tiga = 0; //41-50
  $empat = 0; //>50
  foreach ($all as $item) {
    $tgl = substr($item->tanggal_lahir, 0, 4);
    $usia = Date('Y') - $tgl;
    if ($usia > 50) {
      $empat++;
    } elseif ($usia > 40 && $usia <= 50) {
      $tiga++;
    } elseif ($usia > 30 && $usia <= 40) {
      $dua++;
    } else {
      $satu++;
    }
  }

  //data grafik usia pengawai pns //////////////////////////////////////////////////////
  $satupns = 0; //18-30
  $duapns = 0; //31-40
  $tigapns = 0; //41-50
  $empatpns = 0; //>50
  foreach ($allpns as $item) {
    $tgl = substr($item->tanggal_lahir, 0, 4);
    $usia = Date('Y') - $tgl;
    if ($usia > 50) {
      $empatpns++;
    } elseif ($usia > 40 && $usia <= 50) {
      $tigapns++;
    } elseif ($usia > 30 && $usia <= 40) {
      $duapns++;
    } else {
      $satupns++;
    }
  }

  //pns pensiun
  $total1 = 0;
  $total2 = 0;
  $total3 = 0;
  $total4 = 0;
  $total5 = 0;

  foreach ($allpns as $key) {
    $tgl = substr($key->tanggal_lahir, 0, 4);
    if ((Date('Y') - $tgl) == $key->pensiun) {
      $total1++;
    }
    if (((Date('Y') + 1) - $tgl) == $key->pensiun) {
      $total2++;
    }
    if (((Date('Y') + 1) - $tgl) == $key->pensiun) {
      $total3++;
    }
    if (((Date('Y') + 1) - $tgl) == $key->pensiun) {
      $total4++;
    }
    if (((Date('Y') + 1) - $tgl) == $key->pensiun) {
      $total5++;
    }
  }

  //label dan data grafik kompetensi pegawai ////////////////////////////////////////////////////
  foreach ($komp as $item) {
    $st = $item->kompetensi;
    $hh .= "'$st'" . ", ";
    $jum = $item->jumlah;
    $totalkomp .= "$jum" . ", ";
  }

  // golongan pns
  $satualk = 0;
  $satuapr = 0;
  $satublk = 0;
  $satubpr = 0;
  $satuclk = 0;
  $satucpr = 0;
  $satudlk = 0;
  $satudpr = 0;

  $duaalk = 0;
  $duaapr = 0;
  $duablk = 0;
  $duabpr = 0;
  $duaclk = 0;
  $duacpr = 0;
  $duadlk = 0;
  $duadpr = 0;

  $tigaalk = 0;
  $tigaapr = 0;
  $tigablk = 0;
  $tigabpr = 0;
  $tigaclk = 0;
  $tigacpr = 0;
  $tigadlk = 0;
  $tigadpr = 0;

  $empatalk = 0;
  $empatapr = 0;
  $empatblk = 0;
  $empatbpr = 0;
  $empatclk = 0;
  $empatcpr = 0;
  $empatdlk = 0;
  $empatdpr = 0;
  $empatelk = 0;
  $empatepr = 0;

  foreach ($gol as $item) {
    $gol = $item->pangkat;
    $jk = $item->jk;
    if ($gol == 'Juru Muda (I/A)') {
      ($jk == 'Laki-laki') ? $satualk++ : $satuapr++;
    }
    if ($gol == 'Juru Muda Tingkat I (I/B)') {
      ($jk == 'Laki-laki') ? $satublk++ : $satubpr++;
    }
    if ($gol == 'Juru (I/C)') {
      ($jk == 'Laki-laki') ? $satuclk++ : $satucpr++;
    }
    if ($gol == 'Juru Tingkat I (I/D)') {
      ($jk == 'Laki-laki') ? $satudlk++ : $satudpr++;
    }

    //dua
    if ($gol == 'Pengatur Muda (II/A)') {
      ($jk == 'Laki-laki') ? $duaalk++ : $duaapr++;
    }
    if ($gol == 'Pengatur Muda Tingkat I (II/B)') {
      ($jk == 'Laki-laki') ? $duablk++ : $duabpr++;
    }
    if ($gol == 'Pengatur (II/C)') {
      ($jk == 'Laki-laki') ? $duaclk++ : $duacpr++;
    }
    if ($gol == 'Pengatur Tingkat I (II/D)') {
      ($jk == 'Laki-laki') ? $duadlk++ : $duadpr++;
    }

    //tiga
    if ($gol == 'Penata Muda (III/A)') {
      ($jk == 'Laki-laki') ? $tigaalk++ : $tigaapr++;
    }
    if ($gol == 'Penata Muda Tingkat I (III/B)') {
      ($jk == 'Laki-laki') ? $tigablk++ : $tigabpr++;
    }
    if ($gol == 'Penata (III/C)') {
      ($jk == 'Laki-laki') ? $tigaclk++ : $tigacpr++;
    }
    if ($gol == 'Penata Tingkat I (III/D)') {
      ($jk == 'Laki-laki') ? $tigadlk++ : $tigadpr++;
    }

    //empat
    if ($gol == 'Pembina (IV/A)') {
      ($jk == 'Laki-laki') ? $empatalk++ : $empatapr++;
    }
    if ($gol == 'Pembina Tingkat I (IV/B)') {
      ($jk == 'Laki-laki') ? $empatblk++ : $empatbpr++;
    }
    if ($gol == 'Pembina Utama Muda (IV/C)') {
      ($jk == 'Laki-laki') ? $empatclk++ : $empatcpr++;
    }
    if ($gol == 'Pembina Utama Madya (IV/D)') {
      ($jk == 'Laki-laki') ? $empatdlk++ : $empatdpr++;
    }
    if ($gol == 'Pembina Utama (IV/E)') {
      ($jk == 'Laki-laki') ? $empatelk++ : $empatepr++;
    }
  }
  ?>

  //-------------------------------------------------------------------------------------------------------------------
  //CHART JUMLAH PEGAWAI
  //------------------------------------------------------------------------------------------------------------------- JUMLAH PEGAWAI
  var ctx = document.getElementById("pegawaichart").getContext("2d");
  var data = {
    labels: [<?php /* @noEscape */ print_r($aa); ?>],
    datasets: [{
      data: [<?php /* @noEscape */ echo $totalpn; ?>],
      backgroundColor: ['#DEB887', '#5F9EA0'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }]
  };
  var pegawaichart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
      bezierCurve: false,
      plugins: {
        datalabels: {
          anchor: 'center',
          // align: 'top',
          color: 'rgb(0,0,0)'
        }
      },
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom',
      },
      cutoutPercentage: 3,
    },
  });

  $("#exportpegawaichart").click(function() {
    var canvas = document.getElementById('pegawaichart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(50, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
    pdf.text(100, 45, 'Berdasarkan Jenis Pegawai')
    pdf.addImage(canvas, 'PNG', 70, 65, 165, 105);
    pdf.save("Grafik Jenis Pegawai.pdf");
  });

  //-----------------------------------------------------------------------------------------------------------------------
  //CHART JENIS KELAMIN
  //-----------------------------------------------------------------------------------------------------------------------JENIS KELAMIN
  var ctx = document.getElementById("jkchart").getContext("2d");
  var data = {
    labels: [<?= $bb; ?>],
    datasets: [{
      data: [<?= $totaljk; ?>],
      backgroundColor: ['#DEB887', '#5F9EA0'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }]
  };
  var jkchart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
      plugins: {
        datalabels: {
          anchor: 'center',
          color: 'rgb(0,0,0)'
        }
      },
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom',
      },
      cutoutPercentage: 3,
    },
  });
  $("#exportjkchart").click(function() {
    var canvas = document.getElementById('jkchart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(50, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
    pdf.text(100, 45, 'Berdasarkan Jenis Kelamin')
    pdf.addImage(canvas, 'PNG', 70, 65, 165, 105);
    pdf.save("Grafik Jenis Kelamin.pdf");
  });

  //--------------------------------------------------------------------------------------------------------------
  //CHART PENDIDIKAN
  //--------------------------------------------------------------------------------------------------------------PENDIDIKAN
  var ctx = document.getElementById("pendchart").getContext("2d");
  var data = {
    labels: [<?= $dd; ?>],
    datasets: [{
      data: [<?= $totalpend; ?>],
      backgroundColor: ['#DEB887', '#5F9EA0', '#7FFF00', '#D2691E', '#FF7F50', '#6495ED', '#FFF8DC', '#DC143C', '#8B008B', '#FF8C00'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }]
  };
  var pendchart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
      plugins: {
        datalabels: {
          anchor: 'center',
          align: 'center',
          color: 'rgb(0,0,0)'
        }
      },
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom'
      },
      cutoutPercentage: 3,
    },
  });
  $("#exportpendchart").click(function() {
    var canvas = document.getElementById('pendchart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(50, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
    pdf.text(75, 45, 'Berdasarkan Pendidikan Terakhir')
    pdf.addImage(canvas, 'PNG', 60, 65, 165, 105);
    pdf.save("Grafik Pendidikan Terakhir.pdf");
  });

  //----------------------------------------------------------------------------------------------------------------
  //CHART AGAMA
  //----------------------------------------------------------------------------------------------------------------AGAMA
  var ctx = document.getElementById("agamachart").getContext("2d");
  var data = {
    labels: [<?= $ee; ?>],
    datasets: [{
      data: [<?= $totalagama; ?>],
      backgroundColor: ['#DEB887', '#5F9EA0', '#7FFF00', '#D2691E', '#FF7F50', '#6495ED'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }]
  };
  var agamachart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
      plugins: {
        datalabels: {
          anchor: 'center',
          // align: 'top',
          color: 'rgb(0,0,0)'
        }
      },
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom'
      },
      cutoutPercentage: 60,
    },
  });
  $("#exportagamachart").click(function() {
    var canvas = document.getElementById('agamachart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(50, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
    pdf.text(100, 45, 'Berdasarkan Agama')
    pdf.addImage(canvas, 'PNG', 60, 65, 165, 105);
    pdf.save("Grafik Agama.pdf");
  });

  //------------------------------------------------------------------------------------------------------------------
  // chart umur
  //------------------------------------------------------------------------------------------------------------------UMUR
  var ctx = document.getElementById("umurchart").getContext("2d");
  var data = {
    labels: ["18 - 30", "31 - 40", "41 - 50", ">50"],
    datasets: [{
      data: [<?= $satu; ?>, <?= $dua; ?>, <?= $tiga; ?>, <?= $empat; ?>],
      backgroundColor: ['#DEB887', '#5F9EA0', '#7FFF00', '#D2691E'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }]
  };
  var umurchart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
      plugins: {
        datalabels: {
          anchor: 'center',
          color: 'rgb(0,0,0)'
        }
      },
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom',
      },
      cutoutPercentage: 60,
    },
  });
  $("#exportumurchart").click(function() {
    var canvas = document.getElementById('umurchart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(60, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
    pdf.text(110, 45, 'Berdasarkan Usia')
    pdf.addImage(canvas, 'PNG', 65, 65, 165, 105);
    pdf.save("Grafik Usia.pdf");
  });

  //--------------------------------------------------------------------------------------------------------------------
  //CHART KOMPETENSI
  //--------------------------------------------------------------------------------------------------------------------KOMPETENSI
  //untuk random color chart
  var dynamicColors = function() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgb(" + r + "," + g + "," + b + ")";
  }
  var color = [];
  var dataaa = [<?= $totalkomp ?>];
  for (var i in data) {
    color.push(dynamicColors());
  }

  <?php
  if ($komp != NULL) {
  ?>
    var ctx = document.getElementById("kompchart").getContext("2d");
    var data = {
      labels: [<?= $hh; ?>],
      datasets: [{
        data: [<?= $totalkomp; ?>],
        backgroundColor: color,
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }]
    };
    var kompchart = new Chart(ctx, {
      type: 'pie',
      data: data,
      options: {
        plugins: {
          datalabels: {
            anchor: 'center',
            // align: 'top',
            color: 'rgb(0,0,0)'
          }
        },
        responsive: true,
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "rgb(0,0,0)",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: true,
          labels: {
            boxWidth: 20,
            fontSize: 15,
            padding: 15
          },
          position: 'bottom'
        },
        cutoutPercentage: 3,
      },
    });
    $("#exportkompchart").click(function() {
      var canvas = document.getElementById('kompchart').toDataURL('image/png');
      var pdf = new jsPDF('landscape');
      pdf.setFontSize(25)
      pdf.text(50, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
      pdf.text(55, 45, 'Berdasarkan Jumlah Kompetensi yang Dimiliki')
      pdf.addImage(canvas, 'PNG', 60, 65, 165, 105);
      pdf.save("Grafik Kompetensi.pdf");
    });
  <?php } ?>


  //---------------------------------------------------------------------------------------------------------------
  //chart jk pns non
  //---------------------------------------------------------------------------------------------------------------JENIS KELAMIN PNS NON
  var ctx = document.getElementById("jkpnsnonchart");
  var data = {
    labels: ["PNS", "Non-PNS"],
    datasets: [{
      label: 'Laki-laki',
      backgroundColor: '#008000',
      data: [
        <?= $jumlah_lk_pns; ?>,
        <?= $jumlah_lk_nonpns; ?>
      ]
    }, {
      label: 'Perempuan',
      backgroundColor: '#DC143C',
      data: [
        <?= $jumlah_pr_pns; ?>,
        <?= $jumlah_pr_nonpns; ?>
      ]
    }]
  };
  var jkpnsnonchart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      plugins: {
        datalabels: {
          anchor: 'center',
          align: 'center',
          color: 'rgb(0,0,0)'
        }
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom',
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: true,
        mode: 'index',
        intersect: false,
        caretPadding: 10
      },
      scales: {
        yAxes: [{
          display: true,
          gridLines: {
            display: true,
          },
          ticks: {
            beginAtZero: true
          }
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false,
          }
        }]
      }
    },
  });
  var ctx = {
    responsive: true
  };
  $("#exportjkpnsnonchart").click(function() {
    var canvas = document.getElementById('jkpnsnonchart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(50, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
    pdf.text(55, 45, 'Berdasarkan Jenis Pegawai dan Jenis Kelamin')
    pdf.addImage(canvas, 'PNG', 50, 65, 200, 105);
    pdf.save("Grafik JK PNS Non-PNS.pdf");
  });

  //---------------------------------------------------------------------------------------------------------------
  //chart pendidikan pns non
  //---------------------------------------------------------------------------------------------------------------PENDIDIKAN PNS NON
  var ctx = document.getElementById("pendpnsnonchart");
  var data = {
    labels: ["SD", "SMP", "SMA/K", "D1", "D2", "D3", "D4", "S1", "S2", "S3"],
    datasets: [{
      label: 'PNS',
      backgroundColor: '#8B008B',
      data: [
        <?= $jumlah_sd_pns; ?>,
        <?= $jumlah_smp_pns; ?>,
        <?= $jumlah_smak_pns; ?>,
        <?= $jumlah_d1_pns; ?>,
        <?= $jumlah_d2_pns; ?>,
        <?= $jumlah_d3_pns; ?>,
        <?= $jumlah_d4_pns; ?>,
        <?= $jumlah_s1_pns; ?>,
        <?= $jumlah_s2_pns; ?>,
        <?= $jumlah_s3_pns; ?>
      ]
    }, {
      label: 'Non-PNS',
      backgroundColor: '#FF8C00',
      data: [
        <?= $jumlah_sd_nonpns; ?>,
        <?= $jumlah_smp_nonpns; ?>,
        <?= $jumlah_smak_nonpns; ?>,
        <?= $jumlah_d1_nonpns; ?>,
        <?= $jumlah_d2_nonpns; ?>,
        <?= $jumlah_d3_nonpns; ?>,
        <?= $jumlah_d4_nonpns; ?>,
        <?= $jumlah_s1_nonpns; ?>,
        <?= $jumlah_s2_nonpns; ?>,
        <?= $jumlah_s3_nonpns; ?>
      ]
    }]
  };
  var pendpnsnonchart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: true,
        mode: 'index',
        intersect: false,
        caretPadding: 10
      },
      plugins: {
        datalabels: {
          anchor: 'end',
          align: 'top',
          offset: -5,
          color: 'rgb(0,0,0)',
        }
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 10
        },
        position: 'bottom',
      },
      // barValueSpacing: 20,
      scales: {
        yAxes: [{
          display: true,
          gridLines: {
            display: true,
          },
          ticks: {
            beginAtZero: true,
          }
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false,
          },
          ticks: {
            autoSkip: false
          }
        }]
      }
    },
  });
  var ctx = {
    responsive: true
  };
  $("#exportpendpnsnonchart").click(function() {
    var canvas = document.getElementById('pendpnsnonchart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(53, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah')
    pdf.text(45, 45, 'Berdasarkan Jenis Pegawai dan Pendidikan Terakhir')
    pdf.addImage(canvas, 'PNG', 40, 65, 220, 110);
    pdf.save("Grafik Pendidikan Terakhir PNS Non-PNS.pdf");
  });

  //-------------------------------------------------------------------------------------------------------------------
  //chart usia pns
  //-------------------------------------------------------------------------------------------------------------------USIA PNS
  var ctx = document.getElementById("umurpnschart");
  var umurpnschart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["18 - 30", "31 - 40", "41 - 50", ">50"],
      datasets: [{
        label: "Jumlah",
        data: [<?= $satupns; ?>, <?= $duapns; ?>, <?= $tigapns; ?>, <?= $empatpns; ?>],
        backgroundColor: "rgba(43, 191, 254, 0)",
        hoverBorderColor: "rgba(43, 191, 254, 1)",
        borderColor: "rgb(43, 191, 254)",
      }],
    },
    options: {
      plugins: {
        datalabels: {
          anchor: 'center',
          color: 'rgb(0,0,0)',
          backgroundColor: "rgba(43, 191, 254)",
          borderRadius: 50
        }
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      legend: {
        display: false,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom',
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
          display: true,
          gridLines: {
            display: true
          }
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: {
            autoSkip: false
          }
        }]
      }
    },
  });
  var ctx = {
    responsive: true
  };
  $("#exportumurpnschart").click(function() {
    var canvas = document.getElementById('umurpnschart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(90, 30, 'Grafik Rentang Usia Pegawai PNS')
    pdf.text(98, 45, 'BPSDMD Provinsi Jawa Tengah')
    pdf.addImage(canvas, 'PNG', 48, 65, 200, 105);
    pdf.save("Grafik Rentang Usia PNS.pdf");
  });

  //-----------------------------------------------------------------------------------------------------------------
  //chart pensiun
  //-----------------------------------------------------------------------------------------------------------------PENSIUN
  var ctx = document.getElementById("pensiunchart");
  var pensiunchart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?= Date('Y'); ?>, <?= (Date('Y') + 1); ?>, <?= (Date('Y') + 2); ?>, <?= (Date('Y') + 3); ?>, <?= (Date('Y') + 4); ?>],
      datasets: [{
        label: "Jumlah",
        data: [<?= $total1; ?>, <?= $total2; ?>, <?= $total3; ?>, <?= $total4; ?>, <?= $total5; ?>],
        backgroundColor: ['#DEB887', '#5F9EA0', '#7FFF00', '#D2691E', '#FF7F50'],
        // hoverBackgroundColor: ['#DAA520', '#2e59d9'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10
      },
      plugins: {
        datalabels: {
          anchor: 'center',
          align: 'top',
          offset: -10,
          color: 'rgb(0,0,0)'
        }
      },
      legend: {
        display: false,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 15
        },
        position: 'bottom',
      },
      barValueSpacing: 20,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
          display: true,
          gridLines: {
            display: true
          }
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: {
            autoSkip: false
          }
        }]
      }
    },
  });
  var ctx = {
    responsive: true
  };
  $("#exportpensiunchart").click(function() {
    var canvas = document.getElementById('pensiunchart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(15, 30, 'Grafik Pegawai BPSDMD Provinsi Jawa Tengah yang Akan Pensiun')
    pdf.text(100, 45, 'Dalam 5 Tahun Ke Depan')
    pdf.addImage(canvas, 'PNG', 55, 65, 200, 105);
    pdf.save("Grafik PNS Akan Pensiun.pdf");
  });

  //--------------------------------------------------------------------------------------------------------------
  //chart golongan
  //--------------------------------------------------------------------------------------------------------------GOLONGAN
  var ctx = document.getElementById("golpnschart");
  var golpnschart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["I/A", "I/B", "I/C", "I/D", "II/A", "II/B", "II/C", "II/D", "III/A", "III/B", "III/C", "III/D", "IV/A", "IV/B", "IV/C", "IV/D", "IV/E"],
      datasets: [{
        label: "Laki-laki",
        backgroundColor: '#DAA520',
        data: [
          <?= $satualk; ?>,
          <?= $satublk; ?>,
          <?= $satuclk; ?>,
          <?= $satudlk; ?>,
          <?= $duaalk; ?>,
          <?= $duablk; ?>,
          <?= $duaclk; ?>,
          <?= $duadlk; ?>,
          <?= $tigaalk; ?>,
          <?= $tigablk; ?>,
          <?= $tigaclk; ?>,
          <?= $tigadlk; ?>,
          <?= $empatalk; ?>,
          <?= $empatblk; ?>,
          <?= $empatclk; ?>,
          <?= $empatdlk; ?>,
          <?= $empatelk; ?>
        ],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }, {
        label: "Perempuan",
        backgroundColor: '#FFD700',
        data: [
          <?= $satuapr; ?>,
          <?= $satubpr; ?>,
          <?= $satucpr; ?>,
          <?= $satudpr; ?>,
          <?= $duaapr; ?>,
          <?= $duabpr; ?>,
          <?= $duacpr; ?>,
          <?= $duadpr; ?>,
          <?= $tigaapr; ?>,
          <?= $tigabpr; ?>,
          <?= $tigacpr; ?>,
          <?= $tigadpr; ?>,
          <?= $empatapr; ?>,
          <?= $empatbpr; ?>,
          <?= $empatcpr; ?>,
          <?= $empatdpr; ?>,
          <?= $empatepr; ?>
        ],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      plugins: {
        datalabels: {
          anchor: 'center',
          color: 'rgb(0,0,0)',
          //fungsi agar yang nilai nya 0, data labelsnya ngga tampil
          display: function(context) {
            var index = context.dataIndex;
            var value = context.dataset.data[index];
            // var invert = Math.abs(value) <= 0;
            return value < 1 ? false : true
          }
        }
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "rgb(0,0,0)",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: true,
        mode: 'index',
        intersect: false,
        caretPadding: 10
      },
      legend: {
        display: true,
        labels: {
          boxWidth: 20,
          fontSize: 15,
          padding: 30
        },
        position: 'bottom',
      },
      barValueSpacing: 20,
      scales: {
        yAxes: [{
          display: true,
          gridLines: {
            display: true
          },
          stacked: true
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          stacked: true,
          ticks: {
            autoSkip: false
          }
        }]
      }
    },
  });
  var ctx = {
    responsive: true
  };
  $("#exportgolpnschart").click(function() {
    var canvas = document.getElementById('golpnschart').toDataURL('image/png');
    var pdf = new jsPDF('landscape');
    pdf.setFontSize(25)
    pdf.text(50, 30, 'Grafik Pegawai PNS BPSDMD Provinsi Jawa Tengah')
    pdf.text(100, 45, 'Berdasarkan Pangkat/Golongan')
    pdf.addImage(canvas, 'PNG', 40, 65, 230, 125);
    pdf.save("Grafik Golongan PNS.pdf");
  });
</script>