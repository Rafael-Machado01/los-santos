// REGRA TELEFONE
jQuery.validator.addMethod(
  "celular",
  function (value, element) {
    value = value.replace(/\D/g, ""); // Se não for numero apaga

    if (value.length < 8 || value.length > 9) return false;
    if (/^0+$/.test(value)) return false; // tamanho

    return true;
  },
  "Telefone inválido!",
);

$("#form").validate({
  onkeyup: function (element) {
    $(element).valid();
  },

  onfocusout: function (element) {
    $(element).valid();
  },

  rules: {
    cpf: {
      required: true,
      minlength: 11,
      maxlength: 11,
      digits: true,
    },

    nome: {
      required: true,
      minlength: 3,
      maxlength: 20,
    },

    telefone: {
      required: true,
      celular: true,
    },
  },

  messages: {
    cpf: "CPF deve ter 11 números",
    nome: "Nome inválido",
    telefone: "Telefone inválido",
  },

  submitHandler: function (form) {
    form.submit(); // só envia se estiver tudo certo
  },
});
