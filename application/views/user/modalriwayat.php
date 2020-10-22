<div class="modal fade" id="modalKomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong><?= $nama ?></strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center" id="exampleModalLabel">Kompetensi Bidang</h4>
                <div class="table-responsive">
                    <table class="display table table-bordered" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th>No</th>
                                <th>Kompetensi Bidang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- kompetensi bidang -->
                            <?php
                            if ($dataKomp != NULL) {
                                $nomor = 0;
                                foreach ($dataKomp as $key) {
                                    $nomor++; ?>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle;"><?= filter_var($nomor, FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?></td>
                                        <td style="vertical-align: middle;"><?= filter_var($key['kompetensi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></td>
                                        <?php if ($key['keterangan'] != NULL) { ?>
                                            <td style='vertical-align: middle;'><?= filter_var($key['keterangan'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></td>
                                        <?php } else { ?>
                                            <td style='vertical-align: middle; text-align: center;'>-</td>
                                        <?php } ?>
                                    </tr>
                                <?php }
                            } elseif ($dataKomp == NULL) { ?>
                                <tr>
                                    <td colspan="3" style="text-align: center; vertical-align: middle;">Belum mempunyai data kompetensi bidang</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><br>

                <h4 class="text-center" id="exampleModalLabel">Riwayat Unit Kerja</h4>
                <div class="table-responsive">
                    <table class="display table table-bordered" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th>No</th>
                                <th>Unit Kerja</th>
                                <th>Sub Unit Kerja</th>
                                <th>Tanggal Mulai Kerja</th>
                                <th>Tanggal Selesai Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- //riwayat unit kerja ////////////////////////////////////////////////////////////////////////////////////////// -->
                            <?php
                            $bln = Date('m');
                            $recap = [
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember'
                            ];
                            if ($dataRiwayat != NULL) {
                                $nomor = 0;
                                foreach ($dataRiwayat as $key) {
                                    $nomor++; ?>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle;"><?= filter_var($nomor, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></td>
                                        <td style="vertical-align: middle;"><?= filter_var($key['unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></td>
                                        <td style="vertical-align: middle;"><?= filter_var($key['sub_unit_kerja'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></td>
                                        <?php
                                        $tgl_mulai = $key['tanggal_mulai'];
                                        if ($tgl_mulai != '0000-00-00') {
                                            $tgl = substr($tgl_mulai, 8, 2);
                                            $bln_mulai = substr($tgl_mulai, 5, 2);
                                            $thn_mulai = substr($tgl_mulai, 0, 4);
                                            foreach ($recap as $bln => $value) {
                                                if ($bln == $bln_mulai) { ?>
                                                    <td style='vertical-align: middle; text-align: center;'><?= filter_var($tgl, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <?= filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <?= filter_var($thn_mulai, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></td>
                                            <?php }
                                            }
                                        } elseif ($tgl_mulai == '0000-00-00') { ?>
                                            <td style='vertical-align: middle; text-align: center;'>-</td>
                                            <?php }

                                        $tgl_selesai = $key['tanggal_selesai'];
                                        if ($tgl_selesai != '0000-00-00') {
                                            $tgl1 = substr($tgl_selesai, 8, 2);
                                            $bln_selesai = substr($tgl_selesai, 5, 2);
                                            $thn_selesai = substr($tgl_selesai, 0, 4);
                                            foreach ($recap as $bln => $value) {
                                                if ($bln == $bln_selesai) { ?>
                                                    <td style='vertical-align: middle; text-align: center;'><?= filter_var($tgl1, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <?= filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?> <?= filter_var($thn_selesai, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></td>
                                            <?php }
                                            }
                                        } elseif ($tgl_selesai == '0000-00-00') { ?>
                                            <td style='vertical-align: middle; text-align: center;'>-</td>
                                        <?php } ?>
                                    </tr>
                                <?php }
                            } elseif ($dataRiwayat == NULL) { ?>
                                <tr>
                                    <td colspan="5" style="text-align: center; vertical-align: middle;">Belum mempunyai data riwayat unit kerja</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>