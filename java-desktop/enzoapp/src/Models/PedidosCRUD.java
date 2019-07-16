/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import java.util.List;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.Configuration;

/**
 *
 * @author Kin
 */
public class PedidosCRUD {

    /**
     * @param args the command line arguments
     */
    public static void Cadastrar(Pedidos pedido) {

        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.save(pedido);
        session.getTransaction().commit();
        session.flush();
        session.close();

    }

    public static List Listar() {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();

        Query queryResult = session.createQuery("from Pedidos");
        List todosPedidos;
        todosPedidos = queryResult.list();
        for (int i = 0; i < todosPedidos.size(); i++) {
            Pedidos pedido = (Pedidos) todosPedidos.get(i);
        }
        session.flush();
        session.close();
        return todosPedidos;

    }

    public static Pedidos ListarId(int id) {
        Pedidos pedido = new Pedidos();
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        Query queryResult = session.createQuery("FROM Pedidos WHERE id = :id");
        queryResult.setInteger("id", id);
        pedido = (Pedidos) queryResult.uniqueResult();
        session.flush();
        session.close();
        return pedido;

    }

    public static void Deletar(int id) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        Pedidos pedido = (Pedidos) session.load(Pedidos.class, id);
        session.delete(pedido);
        session.getTransaction().commit();
        session.flush();
        session.close();
    }

    public static void Update(Pedidos pedido) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.update(pedido);

        session.getTransaction().commit();
        session.flush();
        session.close();

    }

}
