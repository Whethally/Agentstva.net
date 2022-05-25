const navMenu = document.getElementById("nav-menu"),
	navToggle = document.getElementById("nav-toggle"),
	navClose = document.getElementById("nav-close"),
	changePassword = document.getElementById("password_edit"),
	modalEdit = document.getElementById("modal-edit");

if (navToggle) {
	navToggle.addEventListener("click", () => {
		navMenu.classList.add("show-menu");
	});
}

if (navClose) {
	navClose.addEventListener("click", () => {
		navMenu.classList.remove("show-menu");
	});
}
$(function () {
	$("#cart_confirm").on("click", function () {
		$(".modal-cart").show();
	});

	$("#password_edit").on("click", function () {
		$(".modal-edit").show();
	});

	$("#editAvatar").on("click", function () {
		$(".modal-edit_Avatar").show();
	});

	$("#post_add").on("click", function () {
		$(".modal-posts_add").show();
	});

	$("#post_edit").on("click", function () {
		$(".modal-posts_edit").show();
	});

	$("#user_add").on("click", function () {
		$(".modal-users_add").show();
	});

	$("#closemodal").on("click", function () {
		$(".modal-edit").hide();
	});

	$("#closemodalCart").on("click", function () {
		$(".modal-cart").hide();
	});

	$("#closemodalAvatar").on("click", function () {
		$(".modal-edit_Avatar").hide();
	});

	$("#closemodalPosts").on("click", function () {
		$(".modal-posts_add").hide();
	});
	$("#closemodalPostsEdit").on("click", function () {
		$(".modal-posts_edit").hide();
	});
	$("#closemodalUsers").on("click", function () {
		$(".modal-users_add").hide();
	});
});

const navLink = document.querySelectorAll(".nav__link");

function linkAction() {
	const navMenu = document.getElementById("nav-menu");
	navMenu.classList.remove("show-menu");
}
navLink.forEach(n => n.addEventListener("click", linkAction));

function scrollHeader() {
	const header = document.getElementById("header");
	if (this.scrollY >= 50) header.classList.add("scroll-header");
	else header.classList.remove("scroll-header");
}
window.addEventListener("scroll", scrollHeader);

const sections = document.querySelectorAll("section[id]");

function scrollActive() {
	const scrollY = window.pageYOffset;

	sections.forEach(current => {
		const sectionHeight = current.offsetHeight,
			sectionTop = current.offsetTop - 58,
			sectionId = current.getAttribute("id");

		if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
			document
				.querySelector(".nav__menu a[href*=" + sectionId + "]")
				.classList.add("active-link");
		} else {
			document
				.querySelector(".nav__menu a[href*=" + sectionId + "]")
				.classList.remove("active-link");
		}
	});
}
window.addEventListener("scroll", scrollActive);
