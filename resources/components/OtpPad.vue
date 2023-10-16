<template>
  <div ref="otpCont" class="flex justify-between">
    <input
        type="text"
        v-for="(el, ind) in digits"
        :key="el + ind"
        v-model="digits[ind]"
        class="form-input w-14 ml-2 text-center"
        :autofocus="ind === 0"
        maxlength="1"
        @keydown="handleKeyDown($event, ind)"
    />
  </div>
</template>
<script setup>
import {ref, reactive} from "vue";

const emit = defineEmits(["update:otpEmail"]);
const props = defineProps({
  default: String,

  digitCount: {
    type: Number,
    required: true,
  },
});

const digits = reactive([]);

if (props.default && props.default.length === props.digitCount) {
  for (let i = 0; i < props.digitCount; i++) {
    digits[i] = props.default.charAt(i);
  }
} else {
  for (let i = 0; i < props.digitCount; i++) {
    digits[i] = null;
  }
}

const otpCont = ref(null);

const handleKeyDown = function (event, index) {
  const isDigitsFull = function () {
    for (const elem of digits) {
      if (elem == null || elem == undefined) {
        return false;
      }
    }

    return true;
  };

  if (
      event.key !== "Tab" &&
      event.key !== "ArrowRight" &&
      event.key !== "ArrowLeft"
  ) {
    event.preventDefault();
  }

  if (event.key === "Backspace") {
    digits[index] = null;

    if (index != 0) {
      otpCont.value.children[index - 1].focus();
    }

    return;
  }

  if (new RegExp("^([0-9])$").test(event.key)) {
    digits[index] = event.key;

    if (index != props.digitCount - 1) {
      otpCont.value.children[index + 1].focus();
    }
  }

  //  Here we are returning back the email login
  if (isDigitsFull()) {
    emit('update:otpEmail', digits.join(''))
  }
};
</script>
<style>
.border-red-500 {
  border: 1px solid red !important;
}
</style>
