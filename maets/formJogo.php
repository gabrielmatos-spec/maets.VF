<?php include "header.php"; ?>


<div class="d-flex justify-content-center mb-3">
    <h2 class="text-white">Cadastrar Jogo</h2>
</div>


<div class="d-flex justify-content-center mb-3">

    <form action="actionJogo.php"
          method="POST"
          class="was-validated"
          enctype="multipart/form-data"
          style="width: 500px;">


        <!-- =========================
             CAPA DO JOGO
        ========================== -->

        <div class="mt-3 mb-3">

            <label for="capaJogo"
                   class="form-label text-white">

                Capa do jogo

            </label>


            <input type="file"
                   name="capaJogo"
                   id="capaJogo"
                   class="form-control"
                   accept=".jpg,.jpeg,.png,.webp"
                   required
                   style="background-color:#171a21;
                          color:white;
                          border:1px solid #2a475e;">


            <div class="valid-feedback">
                Capa selecionada!
            </div>


            <div class="invalid-feedback">
                Selecione a capa do jogo.
            </div>

        </div>



        <!-- =========================
             NOME
        ========================== -->

        <div class="form-floating mt-3 mb-3">

            <input type="text"
                   name="nomeJogo"
                   id="nomeJogo"
                   placeholder="Nome do Jogo"
                   class="form-control"
                   required
                   style="background-color:#171a21;
                          color:white;
                          border:1px solid #2a475e;">


            <label for="nomeJogo" style="color:white;">
                Nome do jogo
            </label>


            <div class="invalid-feedback">
                Informe o nome do jogo.
            </div>

        </div>



        <!-- =========================
             DESCRIÇÃO
        ========================== -->

        <div class="form-floating mt-3 mb-3">

            <textarea name="descricaoJogo"
                      id="descricaoJogo"
                      placeholder="Descrição do Jogo"
                      class="form-control"
                      required
                      style="height:120px;
                             background-color:#171a21;
                             color:white;
                             border:1px solid #2a475e;"></textarea>


            <label for="descricaoJogo" style="color:white;">
                Descrição do jogo
            </label>


            <div class="invalid-feedback">
                Informe uma descrição para o jogo.
            </div>

        </div>



        <!-- =========================
             CATEGORIA
        ========================== -->

        <div class="form-floating mt-3 mb-3">

            <select name="categoriaJogo"
                    id="categoriaJogo"
                    class="form-select"
                    required
                    style="background-color:#171a21;
                           color:white;
                           border:1px solid #2a475e;">


                <option value="" selected disabled>
                    Selecione uma categoria
                </option>


                <option value="Ação">
                    Ação
                </option>


                <option value="Aventura">
                    Aventura
                </option>


                <option value="RPG">
                    RPG
                </option>


                <option value="Estratégia">
                    Estratégia
                </option>


                <option value="Esportes">
                    Esportes
                </option>


                <option value="Corrida">
                    Corrida
                </option>


                <option value="Terror">
                    Terror
                </option>


                <option value="Sobrevivência">
                    Sobrevivência
                </option>


                <option value="Sandbox">
                    Sandbox
                </option>


            </select>


            <label for="categoriaJogo" style="color:white;">
                Categoria
            </label>


            <div class="invalid-feedback">
                Selecione uma categoria.
            </div>

        </div>



        <!-- =========================
             PREÇO
        ========================== -->

        <div class="form-floating mt-3 mb-3">

            <input type="number"
                   name="precoJogo"
                   id="precoJogo"
                   placeholder="Preço"
                   class="form-control"
                   step="0.01"
                   min="0"
                   required
                   style="background-color:#171a21;
                          color:white;
                          border:1px solid #2a475e;">


            <label for="precoJogo" style="color:white;">
                Preço (R$)
            </label>


            <div class="invalid-feedback">
                Informe o preço do jogo.
            </div>

        </div>



        <!-- =========================
             BOTÃO
        ========================== -->

        <div class="text-center mt-4">

            <button type="submit"
                    class="btn btn-dark px-4 py-2">

                Cadastrar Jogo

            </button>

        </div>


    </form>

</div>


<?php include "footer.php"; ?>