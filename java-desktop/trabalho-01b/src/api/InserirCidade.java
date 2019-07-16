package api;

import java.io.IOException;
import java.util.ArrayList;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.jasper.tagplugins.jstl.core.Out;

import bean.Cidade;
import crud.Crud;
import crud.Crud.*;
import connection.Conexao;
/**
 * Servlet implementation class InserirCidade
 */
@WebServlet("/")
public class InserirCidade extends HttpServlet {
	private static final long serialVersionUID = 1L;
    /**
     * @see HttpServlet#HttpServlet()
     */
    public InserirCidade() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		// TODO Auto-generated method stub
		ArrayList<Cidade> cidades = new ArrayList<Cidade>();
		cidades = crud.Crud.listar();
		req.setAttribute("cidades", cidades);
//		res.getWriter().append("Served at: ").append(req.getContextPath());
		req.getRequestDispatcher("/WEB-INF/index.jsp").forward(req, res);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		// TODO Auto-generated method stub
		try {
			Conexao.Conectar();
			Cidade cidade = new Cidade();
			cidade.setId(Integer.parseInt(req.getParameter("codigo")));
			cidade.setCidade(req.getParameter("cidade"));
			cidade.setUf(req.getParameter("uf"));
			crud.Crud.save(cidade);		
			res.sendRedirect(req.getContextPath() + "/InserirCidade");
		}catch(Exception err) {
			res.getWriter().append("Erro ao cadastrar cidade");
		}
		
	}

}
