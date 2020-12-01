/* ============
 * Loader Util
 * ============
 *
 * Loader util to prevent relative directory hell
 */

/* eslint global-require: 0 */
/* eslint import/no-dynamic-require: 0 */
export default {
    /**
     * Method used to load a page
     *
     * @param main The name of the main page
     * @param page The name of the page
     *
     * @returns {*} The page
     */
    view(pageName: string) {
      // return require(`./../views/${pageName}/${pageName}.vue`).default;
      // return () => import(`../views/${pageName}/${pageName}.vue`);
        return () => import(/* webpackChunkName: "about" */`./../views/${pageName}/${pageName}.vue`);

    },

    /**
     * Method used to load a subpage
     *
     * @param main The name of the main page
     * @param page The name of the page
     * @param subpage The name of the subpage
     *
     * @returns {*} The page
     */
    subpage(pageName: string, subpageName: string) {
      return require(`../views/${pageName}/${subpageName}/${subpageName}.vue`).default;
      // return () =>
      //   import(`../views/${pageName}/${subpageName}/${subpageName}.vue`);
    },

    /**
     * Method used to load a layout
     *
     * @param layout The name of the layout
     *
     * @returns {*} The layout
     */
    // layout(layoutName) {
    //   return require(`./../layouts/${layoutName}/${layoutName}.vue`);
    // },

    /**
     * Method used to load a component
     *
     * @param component The name of the component
     *
     * @returns {*} The component
     */
    component(componentName: string) {
      // return require(`../components/${componentName}.vue`).default;
        return () => import(`../components/${componentName}/${componentName}.vue`);
    },
  };
