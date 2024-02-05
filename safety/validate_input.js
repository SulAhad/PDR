function validateInput(input) {
                              var value = input.value;
                              var regex = /^[0-9.]+$/; // только цифры и точка
                              if (!regex.test(value)) {
                                input.value = input.value.replace(/[^0-9.]/g, ''); // удаляем все символы кроме цифр и точки
                                input.style.backgroundColor = 'lightcoral'; // подсвечиваем красным
                                $(input).tooltip({ // инициализируем tooltip
                                  show: { effect: "fade", duration: 200 },
                                  hide: { effect: "fade", duration: 200 }
                                }).tooltip("open"); // открываем tooltip
                              } else {
                                var dotCount = (value.match(/\./g) || []).length; // считаем количество точек
                                if (dotCount > 1) {
                                  input.value = input.value.replace(/\./g, ''); // удаляем все точки кроме первой
                                  input.style.backgroundColor = 'red'; // подсвечиваем красным
                                  $(input).tooltip({ // инициализируем tooltip
                                    show: { effect: "fade", duration: 200 },
                                    hide: { effect: "fade", duration: 200 }
                                  }).tooltip("open"); // открываем tooltip
                                } else {
                                  input.style.backgroundColor = ''; // сбрасываем цвет
                                  $(input).tooltip("destroy"); // удаляем tooltip
                                }
                              }
                            }