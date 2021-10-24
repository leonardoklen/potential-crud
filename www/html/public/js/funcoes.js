const base = 'http://localhost:8000/';

$(document).ready(function () {
    $("#dataNascimento").mask("00/00/0000")

    listar();
})

function mascaras() {
    $(".dataNascimento").mask("00/00/0000")
}

function limparForm() {
    $("#nome").val("");
    $("#sexo").val("");
    $("#idade").val("");
    $("#hobby").val("");
    $("#dataNascimento").val("");
}

function validarCampos(nome, sexo, idade, hobby, dataNascimento) {

    if (nome == "" || sexo == "" || idade == "" || hobby == "" || dataNascimento == "") {
        alert("Preencha todos os campos!");
        return false;
    } else if (dataNascimento.length < 10) {
        alert("Informe uma data de nascimento válida!");
        return false;
    } else {
        return true;
    }
}

function cadastrar() {
    var nome = $("#nome").val();
    var sexo = $("#sexo").val();
    var idade = $("#idade").val();
    var hobby = $("#hobby").val();
    var dataNascimento = $("#dataNascimento").val();

    if (validarCampos(nome, sexo, idade, hobby, dataNascimento)) {
        $.ajax({
            url: base + 'api/post/developers',
            type: 'POST',
            dataType: 'json',
            data: {
                nome: nome,
                sexo: sexo,
                idade: idade,
                hobby: hobby,
                dataNascimento: dataNascimento
            },
            success: function () {
                limparForm();
                listar();
            },
            error: function () {
                alert("Erro no cadastrar.");
            }
        });
    }
}

function editar(key) {
    var id = document.getElementById('id' + key).value;
    var nome = document.getElementById('nome' + key).value;
    var sexo = document.getElementById('sexo' + key).value;
    var idade = document.getElementById('idade' + key).value;
    var hobby = document.getElementById('hobby' + key).value;
    var dataNascimento = document.getElementById('dataNascimento' + key).value;

    if (validarCampos(nome, sexo, idade, hobby, dataNascimento)) {
        if (confirm("Deseja mesmo editar este desenvolvedor?")) {
            $.ajax({
                url: base + 'api/put/developers/' + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    nome: nome,
                    sexo: sexo,
                    idade: idade,
                    hobby: hobby,
                    dataNascimento: dataNascimento,
                },
                success: function () {
                    listar();
                },
                error: function () {
                    listar();
                }
            });
        }
    } else {
        listar();
    }
}

function excluir(id) {
    if (confirm("Deseja mesmo excluir este desenvolvedor?")) {
        var id = id
        $.ajax({
            url: base + 'api/delete/developers/' + id,
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function () {
                listar();
            },
            error: function (xhr, status, error) {
                listar();
            }
        });
    }
}

function listar() {
    $.ajax({
        url: base + 'desenvolvedor/consultar',
        dataType: 'html',
        success: function (dados) {
            $("#tbody").html(dados);
            mascaras();
        },
        error: function () {
            listar();
        }
    });
}

function buscar(valor) {
    if (valor == "") {
        listar();
    } else {
        var valor = valor.replaceAll(".", "").replaceAll("-", "").replaceAll("/", "-");
        $.ajax({
            url: base + 'desenvolvedor/consultar',
            type: 'POST',
            data: {
                valor: valor
            },
            success: function (data) {
                $("#tbody").html(data);
                mascaras();
            },
            error: function () {
                alert("Erro no buscar");
            }
        });
    }
}