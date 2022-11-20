                <table width="100%" cellspacing="1" border="1">
                    <thead>
                        <tr align="center">
                            <th colspan="3">DATA NILAI</th>
                        </tr>
                        <tr>
                        <?php foreach ($aktif as $value) : ?>
                            <th>Nama</th>
                            <td align="center"><?= $value['nama']; ?></td>
                        <?php endforeach ?>
                        </tr>
                        <br>
                    </thead>
                    <tbody align="center">
                        <?php foreach ($aktif as $value) : ?>
                            <tr>
                                <th>No</th>
                                <th>Penelitian</th>
                                <th>Nilai Angka</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Pengetahuan</td>
                                <td><?= $value['pengetahuan']; ?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Keterampilan</td>
                                <td><?= $value['keterampilan']; ?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kemampuan</td>
                                <td><?= $value['kemampuan']; ?></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Disiplin</td>
                                <td><?= $value['disiplin']; ?></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Nilai Rata-Rata</td>
                                <td><?= $value['total']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    </thead>
                </table>