<template>
    <header>
        <nav
            data-aos="fade-down"
            data-aos-offset="200"
            data-aos-delay="150"
            data-aos-duration="1000"
        >
            <div
                data-aos="fade-right"
                data-aos-offset="200"
                data-aos-delay="150"
                data-aos-duration="1500"
                data-aos-easing="ease-in-out"
                class="logo"
            >
                <img src="/images/boolbnb.png" alt="" />
            </div>
            <ul>
                <li
                    v-for="(item, index) in menuItem"
                    :key="index"
                    :class="{ active: index === activeIndex }"
                    @click="activeIndex = index"
                >
                    <router-link :to="{ name: item.routeName }" class="link">{{
                        item.label
                    }}</router-link>
                </li>
            </ul>
            <div
                data-aos="fade-left"
                data-aos-offset="200"
                data-aos-delay="150"
                data-aos-duration="1500"
                data-aos-easing="ease-in-out"
                class="my-btn"
            >
                <a href="/admin/houses">
                    <div class="my-btn">Area riservata</div></a
                >
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            menuItem: [
                {
                    label: "Home",
                    routeName: "landing-page",
                },
                {
                    label: "Case",
                    routeName: "home",
                },
                {
                    label: "Chi Siamo",
                    routeName: "about",
                },
                {
                    label: "Contatti",
                    routeName: "contact",
                },
            ],
            activeIndex: 0,
        };
    },
};
</script>

<style lang="scss" scoped></style>
