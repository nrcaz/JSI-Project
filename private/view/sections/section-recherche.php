<section id="recherche">
    <h1>Ma section "Recherche" comprenant :</h1>
    <ul>
        <li>Un formulaire d'ajout des besoins</li>
        <!-- <li>Un récapitulatif des besoins</li> -->
        <!-- <li>Une conclusion (avec un graphique dynamique si possible)</li> -->
        <!-- <li>Un formulaire de contact ("Confiez nous votre recherche de locaux / biens immobiliers")</li> -->

        <!--- <div class="row justify-content-around"> ligne des deux formulaire -->
  
      
    
    <!-- contient les deux form   -->
      <div class="row justify-content-around">
        <!-- Le formulaire de simulation -->
        <!--------------------------------->
        <div class="col-lg-4 col-md-4 col-sm-4 ">
          <h4 class="title">Votre Simulation</h4>
          <div id="message"></div>
          
          <form class="contact-form php-mail-form" role="form" action="contactform/contactform.php" method="POST">
          
          <!-- Ligne Nb bureau -->
          <div class="row mt-2 justify-content-center ">
            <div class="form-group col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
          
                <select class="form-control" id="exampleSelect1">
                <option selected disabled >Nombre de</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
            </div>

            <div class="form-group col-lg-6 col-md-6 col-sm-4">
              <fieldset>
               <!-- <label class="control-label" for="readOnlyInput">Votre mobilier</label> -->
                <input class="form-control-plaintext" id="readOnlyInput" type="text" placeholder="BUREAU" readonly="">
              </fieldset>
            </div>
          
            <blockquote class="blockquote text-center d-flex align-items-basline">
              <p class="mb-0 mt-2">pour</p>
              </blockquote>

            <div class="form-group-inline col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
              <div class="form-group form-group-inline ">
                  <select class="form-control" id="exampleSelect1">
                    <option selected disabled >Personne</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  
              </div>
            </div>

          <!-- FIN Ligne Nb bureau -->
          </div>

          <!-- Ligne Nb OPEN SPACE -->
          <div class="row mt-2 justify-content-center ">
            <div class="form-group col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
              
                <select class="form-control" id="exampleSelect1">
                <option selected disabled >Nombre de</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
            </div>

            <div class="form-group col-lg-6 col-md-6 ">
              <fieldset>
               <!-- <label class="control-label" for="readOnlyInput">Votre mobilier</label> -->
                <input class="form-control-plaintext" id="readOnlyInput" type="text" placeholder="OPEN SPACE" readonly="">
              </fieldset>
            </div>

            <blockquote class="blockquote text-center">
              <p class="mb-0 mt-2">pour</p>
              </blockquote>

            <div class="form-group-inline col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
              <div class="form-group form-group-inline ">
                  <select class="form-control" id="exampleSelect1">
                    <option selected disabled >Personne</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  
              </div>
            </div>

          <!-- FIN Ligne Nb OPEN SPACE -->
          </div>

            <!-- Ligne Nb SALLE DE REUNION -->
          <div class="row mt-2 justify-content-center ">
            <div class="form-group col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
              
                <select class="form-control" id="exampleSelect1">
                <option selected disabled >Nombre de</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
            </div>

            <div class="form-group col-lg-6 col-md-6 ">
              <fieldset>
               <!-- <label class="control-label" for="readOnlyInput">Votre mobilier</label> -->
                <input class="form-control-plaintext" id="readOnlyInput" type="text" placeholder="SALLE DE REUNION" readonly="">
              </fieldset>
            </div>

            <blockquote class="blockquote text-center">
              <p class="mb-0 mt-2">pour</p>
              </blockquote>

            <div class="form-group-inline col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
              <div class="form-group form-group-inline ">
                  <select class="form-control" id="exampleSelect1">
                    <option selected disabled >Personne</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  
              </div>
            </div>

          <!-- FIN Ligne Nb SALLE DE REUNION -->
          </div>

          <!-- Ligne Nb CUISINE / ESPACE DETENTE -->
          <div class="row mt-2 justify-content-center ">
            <div class="form-group col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
              
                <select class="form-control" id="exampleSelect1">
                <option selected disabled >Nombre de</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
            </div>

            <div class="form-group col-lg-6 col-md-6 ">
              <fieldset>
               <!-- <label class="control-label" for="readOnlyInput">Votre mobilier</label> -->
                <input class="form-control-plaintext" id="readOnlyInput" type="text" placeholder="CUISINE / ESPACE DETENTE" readonly="">
              </fieldset>
            </div>

            <blockquote class="blockquote text-center">
              <p class="mb-0 mt-2">pour</p>
              </blockquote>

            <div class="form-group-inline col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
              <div class="form-group form-group-inline ">
                  <select class="form-control" id="exampleSelect1">
                    <option selected disabled >Personne</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  
              </div>
            </div>

          <!-- FIN Ligne Nb CUISINE / ESPACE DETENTE -->
          </div>

              <div class="loading"></div>
              <div class="error-message"></div>
              <div class="sent-message mt-4">Votre demande à bien été envoyé!</div>

              <div class="form-send ">
                <button type="submit" class="btn btn-large btn-primary">Envoyé votre demande</button>
              </div>
            </form>
          
            <!---Fin fomulaire Simulation ----->
            <!--------------------------------->
          
        </div>
      



        <!-- Le formulaire de contact -->
        <div class="col-lg-4 col-md-4 col-sm-4 ">
            <h4 class="title">CONTACTEZ NOUS</h4>
            <div id="message"></div>
            <form class="contact-form php-mail-form" role="form" action="contactform/contactform.php" method="POST">

              <div class="form-group">
                <input type="name" name="name" class="form-control" id="contact-name" placeholder="Votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="name" name="societe" class="form-control" id="contact-societe" placeholder="Nom de Votre Socièté" data-rule="minlen:4" data-msg="Please enter at least 4 chars" >
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" id="contact-email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" id="contact-message" placeholder="Votre Message" rows="3" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>

              <div class="loading"></div>
              <div class="error-message"></div>
              <div class="sent-message">Votre demande à bien été envoyé!</div>

              <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary">Envoyé votre demande</button>
              </div>

            </form>
          </div>
          <!-- Fin des formulaire -->
          <!--------------------------------->
        </div>
      </div>
    <!--   </div>   fin de la ligne des formulaires -->
   

        <li>Liste des annonces</li>
    </ul>
</section>

