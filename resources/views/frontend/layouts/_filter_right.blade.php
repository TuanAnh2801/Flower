<style>
  #filter {
  margin: 0;
  font-family: "Poppins", Arial, sans-serif;

  color: #fff;
  display: grid;
  place-items: center;
  justify-content: end;
  /* justify-content: start; */
  /* margin: auto; */
  /* width: 1140px */

}

ul {
  list-style: none;
  margin-block-start: 0;
  margin-block-end: 0;
  padding-inline-start: 0;
}
.dropdown {
  position: relative;
}
.label {
  cursor: pointer;
  
  padding: 0.8rem 1rem;
  width: 100%;
  display: block;
  box-sizing: border-box;
  transition: all 0.3s;
  border: 1px solid black;
  color: black
}

.items a {
  color: #d8c8c8;
  display: flex;
  align-items: center;
  padding: 0.5rem 1rem;
  text-decoration: none;
  transition: all 0.2s;
}
.items a:hover {
  border-left: 5px solid;
  background: rgb(37, 37, 37);
}

.fa-brands,
.fa-solid {
  margin-right: 10px;
}

.items {
  background: rgb(52, 52, 52);
  opacity: 0;
  visibility: hidden;
  min-width: 100%;
  height: 0;
  position: absolute;
  top: 48px;
  transform-origin: top;
  transform: scaleY(0);
  transition: transform 0.3s;
}

.items::before {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  background: rgb(52, 52, 52);
  transform: rotate(45deg);
  top: -7px;
  left: 20px;
  z-index: -1;
}

.dropdown:hover > .items {
  opacity: 1;
  visibility: visible;
  height: unset;
  transform: scaleY(1);
}

.dropdown:hover > .label {
  background: rgb(255, 115, 0);
}
</style>
<div id="filter">
  <div class="dropdown">
    <span class="label"><i class="fa-solid fa-link"></i>Lọc A-Z </span>
    <ul class="items">
      <li>
        <a href=""> Mặc Định</a>
      </li>
      <li>
        <a href=""> Sản Phẩm Cũ</a>
      </li>
      <li>
        <a href=""> Giá A-Z</a>
      </li>
      <li>
        <a href=""> Giá Z-A</a>
      </li>

    </ul>
  </div>
</div>
