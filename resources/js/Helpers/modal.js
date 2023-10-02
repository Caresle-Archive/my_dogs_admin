/**
 * Expects a reactive object with a property `show`
 * @param { reactive } ref
 */

export const openModal = (ref) => {
    ref.show = true;
};

/**
 * Expects a reactive object with a property `show`
 * @param { reactive } ref
 */
export const closeModal = (ref) => {
    ref.show = false;
};
