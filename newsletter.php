          <form class="email" action="index.php" method="post">
              <table>
                <thead>
                  <th colspan="2"><h2>Newsletter</h2></th>
                </thead>
                <tbody>
                  <tr>
                    <td><p class="tableau_mail">Mail: </p></td>
                    <td><input type="email" name="email" value="" placeholder="Ex:contact@sdis01.fr"></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                        <div class="message">
                          <?php echo $message_newsletter; ?>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <th colspan="2"><input class="button" type="submit" value="S'abonner"></th>
                  </tr>
                  <tr>
                      <th colspan="2">
                        <div class="copyrightV2">
                            <p>© 2005-2018 Created by M.Tourrette</p>
                        </div>
                      </th>
                  </tr>
                </tbody>
              </table>
          </form>
