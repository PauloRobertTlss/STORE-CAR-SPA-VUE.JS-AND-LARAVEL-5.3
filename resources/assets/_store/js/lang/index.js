import Vue from 'vue'
import VueI18n from 'vue-i18n'
import Cookies from 'js-cookie'
import elementEnLocale from 'element-ui/lib/locale/lang/en' // element-ui lang
import elementBrLocale from 'element-ui/lib/locale/lang/pt-br'// element-ui lang
import enLocale from './en'
import brLocale from './pt_BR'

Vue.use(VueI18n);

const messages = {
  en: {
    ...enLocale,
    ...elementEnLocale
  },
  br: {
    ...brLocale,
    ...elementBrLocale
  }
};

const i18n = new VueI18n({
  // set locale
  // options: en or zh
  locale: Cookies.get('language') || 'br',
  // set locale messages
  messages
});

export default i18n
